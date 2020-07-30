<?php
namespace nenad;

use yii\helpers\FormatConverter;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;
use yii\web\View;
use Yii;

/**
 * Base input widget class for yii2-widgets
 */
class InputWidget extends \yii\widgets\InputWidget
{
    const LOAD_PROGRESS = '<div class="kv-plugin-loading">&nbsp;</div>';

    /**
     * @var string the language configuration (e.g. 'fr-FR', 'zh-CN'). 
     * The format for the language/locale is ll-CC where ll is a two or three letter lowercase code
     * for a language according to ISO-639 and CC is the country code according to ISO-3166.
     * If this property not set, then the current application language will be used.
     */
    public $language;

    /**
     * @var mixed show loading indicator while plugin loads
     */
    public $pluginLoading = true;

    /**
     * @var array the data (for list inputs)
     */
    public $data = [];

    /**
     * @var array widget plugin options
     */
    public $pluginOptions = [];

    /**
     * @var array widget JQuery events. You must define events in
     * event-name => event-function format
     * for example:
     * ~~~
     * pluginEvents = [
     *        "change" => "function() { log("change"); }",
     *        "open" => "function() { log("open"); }",
     * ];
     * ~~~
     */
    public $pluginEvents = [];

    /**
     * @var boolean whether the widget should automatically format the date from
     * the PHP DateTime format to the javascript/jquery plugin format
     * @see http://php.net/manual/en/function.date.php
     */
    public $convertFormat = false;

    /**
     * @var string the hashed variable to store the pluginOptions
     */
    protected $_hashVar;

    /**
     * @var string the Json encoded options
     */
    protected $_encOptions = '';

    /**
     * @var string the indicator for loading
     */
    protected $_loadIndicator = '';

    /**
     * @var string the two or three letter lowercase code 
     * for the language according to ISO-639
     */
    protected $_lang = '';


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if (!isset($this->language)) {
            $this->language = Yii::$app->language;
        }
        $this->_lang = $this->getLang($this->language);
        if ($this->pluginLoading) {
            $this->_loadIndicator = self::LOAD_PROGRESS;
        }
        if ($this->hasModel()) {
            $this->name = empty($this->options['name']) ? Html::getInputName($this->model,
                $this->attribute) : $this->options['name'];
            $this->value = $this->model[Html::getAttributeName($this->attribute)];
        }
        $view = $this->getView();
        AssetBundle::register($view);
    }

    /**
     * Initialize the plugin language
     *
     * @param string $property the name of language property in [[pluginOptions]].
     * Defaults to 'language'.
     */
    protected function initLanguage($property = 'language')
    {
        if (empty($this->pluginOptions[$property]) && $this->_lang != 'en') {
            $this->pluginOptions[$property] = $this->_lang;
        }
    }

    /**
     * Adds an asset to the view
     *
     * @param View $view The View object
     * @param string $file The asset file name
     * @param string $type The asset file type (css or js)
     * @param string $class The class name of the AssetBundle
     */
    protected function addAsset($view, $file, $type, $class)
    {
        if ($type == 'css' || $type == 'js') {
            $asset = $view->getAssetManager();
            $bundle = $asset->bundles[$class];
            if ($type == 'css') {
                $bundle->css[] = $file;
            } else {
                $bundle->js[] = $file;
            }
            $asset->bundles[$class] = $bundle;
            $view->setAssetManager($asset);
        }
    }

    /**
     * Generates an input
     */
    protected function getInput($type, $list = false)
    {
        if ($this->hasModel()) {
            $input = 'active' . ucfirst($type);
            return $list ?
                Html::$input($this->model, $this->attribute, $this->data, $this->options) :
                Html::$input($this->model, $this->attribute, $this->options);
        }
        $input = $type;
        $checked = false;
        if ($type == 'radio' || $type == 'checkbox') {
            $this->options['value'] = $this->value;
            $checked = ArrayHelper::remove($this->options, 'checked', false);
        }
        return $list ?
            Html::$input($this->name, $this->value, $this->data, $this->options) :
            (($type == 'checkbox' || $type == 'radio') ?
                Html::$input($this->name, $checked, $this->options) :
                Html::$input($this->name, $this->value, $this->options));
    }

    /**
     * Generates a hashed variable to store the pluginOptions. The following special data attributes
     * will also be setup for the input widget, that can be accessed through javascript:
     * - 'data-plugin-options' will store the hashed variable storing the plugin options.
     * - 'data-plugin-name' the name of the plugin
     *
     * @param string $name the name of the plugin
     * @author [Thiago Talma](https://github.com/thiagotalma)
     */
    protected function hashPluginOptions($name)
    {
        $this->_encOptions = empty($this->pluginOptions) ? '' : Json::encode($this->pluginOptions);
        $this->_hashVar = $name . '_' . hash('crc32', $this->_encOptions);
        $this->options['data-plugin-name'] = $name;
        $this->options['data-plugin-options'] = $this->_hashVar;
    }

    /**
     * Registers plugin options by storing it in a hashed javascript variable
     */
    protected function registerPluginOptions($name)
    {
        $view = $this->getView();
        $this->hashPluginOptions($name);
        $encOptions = empty($this->_encOptions) ? '{}' : $this->_encOptions;
        $view->registerJs("var {$this->_hashVar} = {$encOptions};\n", View::POS_HEAD);
    }

    /**
     * Registers a specific plugin and the related events
     *
     * @param string $name the name of the plugin
     * @param string $element the plugin target element
     * @param string $callback the javascript callback function to be called after plugin loads
     * @param string $callbackCon the javascript callback function to be passed to the plugin constructor
     */
    protected function registerPlugin($name, $element = null, $callback = null, $callbackCon = null)
    {
        $id = $element == null ? "jQuery('#" . $this->options['id'] . "')" : $element;
        $view = $this->getView();
        if ($this->pluginOptions !== false) {
            $this->registerPluginOptions($name, View::POS_HEAD);
            $script = "{$id}.{$name}({$this->_hashVar})";
            if ($callbackCon != null) {
                $script = "{$id}.{$name}({$this->_hashVar}, {$callbackCon})";
            }
            if ($callback != null) {
                $script = "jQuery.when({$script}).done({$callback});";
            }
            $view->registerJs($script);
        }

        if (!empty($this->pluginEvents)) {
            $js = [];
            foreach ($this->pluginEvents as $event => $handler) {
                $function = new JsExpression($handler);
                $js[] = "{$id}.on('{$event}', {$function});";
            }
            $js = implode("\n", $js);
            $view->registerJs($js);
        }
    }

    /**
     * Automatically convert the date format from PHP DateTime to Javascript DateTime format
     *
     * @see http://php.net/manual/en/function.date.php
     * @see http://bootstrap-datetimepicker.readthedocs.org/en/release/options.html#format
     * @param string $format the PHP date format string
     * @return string
     */
    protected static function convertDateFormat($format)
    {
        return strtr($format, [
            // meridian lowercase
            'a' => 'p',
            // meridian uppercase
            'A' => 'P',
            // second (with leading zeros)
            's' => 'ss',
            // minute (with leading zeros)
            'i' => 'ii',
            // hour in 12-hour format (no leading zeros)
            'g' => 'H',
            // hour in 24-hour format (no leading zeros)
            'G' => 'h',
            // hour in 12-hour format (with leading zeros)
            'h' => 'HH',
            // hour in 24-hour format (with leading zeros)
            'H' => 'hh',
            // day of month (no leading zero)
            'j' => 'd',
            // day of month (two digit)
            'd' => 'dd',
            // day name short is always 'D'
            // day name long
            'l' => 'DD',
            // month of year (no leading zero)
            'n' => 'm',
            // month of year (two digit)
            'm' => 'mm',
            // month name short is always 'M'
            // month name long
            'F' => 'MM',
            // year (two digit)
            'y' => 'yy',
            // year (four digit)
            'Y' => 'yyyy',
        ]);
    }

    /**
     * Parses date format based on attribute type using yii\helpers\FormatConverter
     * Used only within DatePicker and DateTimePicker.
     *
     * @param string $type the attribute type whether date, datetime, or time
     * @return mixed|string
     * @throws InvalidConfigException
     */
    protected function parseDateFormat($type)
    {
        if (!$this->convertFormat) {
            return;
        }
        if (isset($this->pluginOptions['format'])) {
            $format = static::convertDateFormat($this->pluginOptions['format']);
            $this->pluginOptions['format'] = $format;
            return;
        }
        $attrib = $type . 'Format';
        $format = isset(Yii::$app->formatter->$attrib) ? Yii::$app->formatter->$attrib : '';
        if (isset($this->dateFormat) && strncmp($this->dateFormat, 'php:', 4) === 0) {
            $this->pluginOptions['format'] = static::convertDateFormat(substr($format, 4));
        } elseif ($format != '') {
            $format = FormatConverter::convertDateIcuToPhp($format, $type);
            $this->pluginOptions['format'] = static::convertDateFormat($format);
        } else {
            throw InvalidConfigException("Error parsing '{$type}' format.");
        }
    }

    /**
     * Convert a language string in yii\i18n format to 
     * a ISO-639 format (2 or 3 letter code).
     * @param string $language the input language string
     * @return string
     */
    protected function getLang($language) {
        $pos = strpos($language, "-");
        return $pos > 0 ? substr($language, 0, $pos) : $language;
    }
}