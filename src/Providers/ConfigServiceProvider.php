<?php 

namespace Bot\Providers;

use League\Container\ServiceProvider\AbstractServiceProvider;

/**
* Base config service provider, allow use config files in application
* 
* TODO: Make ConfigManager class for managing config files and these values
*/
class ConfigServiceProvider extends AbstractServiceProvider
{
    
    /**
     * Array with paths for config files
     * 
     * @var array
     */
    protected $files = [];

    /**
     * {@inheritdoc}
     */
    protected $provides = [
        'config'
    ];

    /**
     * Base config directory path
     * 
     * @var string
     */
    protected $configDirectory;

    /**
     * Set the all options for config
     * 
     * @param string base_path to config files
     */
    public function __construct($dir = null)
    {
        $this->setConfigDirectory($dir);
        $this->putConfigFiles();
    }


    /**
     * Register config files
     *  
     * @return void
     */
    public function register() : void
    {
        $this->container->share('config', function(){
            return $this->configure();
        });
    }

    /**
     * Registered files for
     * 
     * @return array
     */
    public function files() : array
    {
        return [
            'db' => 'database/database.config.php',
            'locale' => 'locale/locale.php'
        ];
    }

    /**
     * Configure config values from files
     * 
     * @return array
     */
    public function configure() : array
    {
        $config = [];

        foreach ($this->files as $configKey => $configFile) {
            $config[$configKey] = include $configFile;
        }

        return $config;
    }

    /**
     * Setter for config directory
     * 
     * @param string|null $dir [description]
     */
    protected function setConfigDirectory(string $dir = null)
    {
        $this->configDirectory = $dir === null ? path('config') : $dir;
    }

    protected function putConfigFiles()
    {
        foreach ($this->files() as $configKey => $filePath) {
            $this->files[$configKey] = realpath($this->configDirectory . '/' . $filePath);
        };
    }


}

