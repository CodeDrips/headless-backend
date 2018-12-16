<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbd85dc5d1b1b947ae7afbf80e4f97684
{
    public static $files = array (
        'b50336562d531777993d90ca775abd88' => __DIR__ . '/../..' . '/controller.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Symfony\\Component\\Yaml\\' => 23,
            'Sober\\Controller\\Module\\' => 24,
            'Sober\\Controller\\' => 17,
        ),
        'N' => 
        array (
            'Noodlehaus\\' => 11,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
        'B' => 
        array (
            'Brain\\Hierarchy\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Symfony\\Component\\Yaml\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/yaml',
        ),
        'Sober\\Controller\\Module\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Module',
        ),
        'Sober\\Controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Noodlehaus\\' => 
        array (
            0 => __DIR__ . '/..' . '/hassankhan/config/src',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
        'Brain\\Hierarchy\\' => 
        array (
            0 => __DIR__ . '/..' . '/brain/hierarchy/src',
        ),
    );

    public static $classMap = array (
        'Brain\\Hierarchy\\Branch\\Branch404' => __DIR__ . '/..' . '/brain/hierarchy/src/Branch/Branch404.php',
        'Brain\\Hierarchy\\Branch\\BranchArchive' => __DIR__ . '/..' . '/brain/hierarchy/src/Branch/BranchArchive.php',
        'Brain\\Hierarchy\\Branch\\BranchAttachment' => __DIR__ . '/..' . '/brain/hierarchy/src/Branch/BranchAttachment.php',
        'Brain\\Hierarchy\\Branch\\BranchAuthor' => __DIR__ . '/..' . '/brain/hierarchy/src/Branch/BranchAuthor.php',
        'Brain\\Hierarchy\\Branch\\BranchCategory' => __DIR__ . '/..' . '/brain/hierarchy/src/Branch/BranchCategory.php',
        'Brain\\Hierarchy\\Branch\\BranchDate' => __DIR__ . '/..' . '/brain/hierarchy/src/Branch/BranchDate.php',
        'Brain\\Hierarchy\\Branch\\BranchEmbed' => __DIR__ . '/..' . '/brain/hierarchy/src/Branch/BranchEmbed.php',
        'Brain\\Hierarchy\\Branch\\BranchFrontPage' => __DIR__ . '/..' . '/brain/hierarchy/src/Branch/BranchFrontPage.php',
        'Brain\\Hierarchy\\Branch\\BranchHome' => __DIR__ . '/..' . '/brain/hierarchy/src/Branch/BranchHome.php',
        'Brain\\Hierarchy\\Branch\\BranchInterface' => __DIR__ . '/..' . '/brain/hierarchy/src/Branch/BranchInterface.php',
        'Brain\\Hierarchy\\Branch\\BranchPage' => __DIR__ . '/..' . '/brain/hierarchy/src/Branch/BranchPage.php',
        'Brain\\Hierarchy\\Branch\\BranchPaged' => __DIR__ . '/..' . '/brain/hierarchy/src/Branch/BranchPaged.php',
        'Brain\\Hierarchy\\Branch\\BranchPostTypeArchive' => __DIR__ . '/..' . '/brain/hierarchy/src/Branch/BranchPostTypeArchive.php',
        'Brain\\Hierarchy\\Branch\\BranchSearch' => __DIR__ . '/..' . '/brain/hierarchy/src/Branch/BranchSearch.php',
        'Brain\\Hierarchy\\Branch\\BranchSingle' => __DIR__ . '/..' . '/brain/hierarchy/src/Branch/BranchSingle.php',
        'Brain\\Hierarchy\\Branch\\BranchSingular' => __DIR__ . '/..' . '/brain/hierarchy/src/Branch/BranchSingular.php',
        'Brain\\Hierarchy\\Branch\\BranchTag' => __DIR__ . '/..' . '/brain/hierarchy/src/Branch/BranchTag.php',
        'Brain\\Hierarchy\\Branch\\BranchTaxonomy' => __DIR__ . '/..' . '/brain/hierarchy/src/Branch/BranchTaxonomy.php',
        'Brain\\Hierarchy\\FileExtensionPredicate' => __DIR__ . '/..' . '/brain/hierarchy/src/FileExtensionPredicate.php',
        'Brain\\Hierarchy\\Finder\\CallbackTemplateFinder' => __DIR__ . '/..' . '/brain/hierarchy/src/Finder/CallbackTemplateFinder.php',
        'Brain\\Hierarchy\\Finder\\FindFirstTemplateTrait' => __DIR__ . '/..' . '/brain/hierarchy/src/Finder/FindFirstTemplateTrait.php',
        'Brain\\Hierarchy\\Finder\\FoldersTemplateFinder' => __DIR__ . '/..' . '/brain/hierarchy/src/Finder/FoldersTemplateFinder.php',
        'Brain\\Hierarchy\\Finder\\LocalizedTemplateFinder' => __DIR__ . '/..' . '/brain/hierarchy/src/Finder/LocalizedTemplateFinder.php',
        'Brain\\Hierarchy\\Finder\\SubfolderTemplateFinder' => __DIR__ . '/..' . '/brain/hierarchy/src/Finder/SubfolderTemplateFinder.php',
        'Brain\\Hierarchy\\Finder\\SymfonyFinderAdapter' => __DIR__ . '/..' . '/brain/hierarchy/src/Finder/SymfonyFinderAdapter.php',
        'Brain\\Hierarchy\\Finder\\TemplateFinderInterface' => __DIR__ . '/..' . '/brain/hierarchy/src/Finder/TemplateFinderInterface.php',
        'Brain\\Hierarchy\\Hierarchy' => __DIR__ . '/..' . '/brain/hierarchy/src/Hierarchy.php',
        'Brain\\Hierarchy\\Loader\\AggregateTemplateLoaderInterface' => __DIR__ . '/..' . '/brain/hierarchy/src/Loader/AggregateTemplateLoaderInterface.php',
        'Brain\\Hierarchy\\Loader\\CascadeAggregateTemplateLoader' => __DIR__ . '/..' . '/brain/hierarchy/src/Loader/CascadeAggregateTemplateLoader.php',
        'Brain\\Hierarchy\\Loader\\ExtensionMapTemplateLoader' => __DIR__ . '/..' . '/brain/hierarchy/src/Loader/ExtensionMapTemplateLoader.php',
        'Brain\\Hierarchy\\Loader\\FileRequireLoader' => __DIR__ . '/..' . '/brain/hierarchy/src/Loader/FileRequireLoader.php',
        'Brain\\Hierarchy\\Loader\\TemplateLoaderInterface' => __DIR__ . '/..' . '/brain/hierarchy/src/Loader/TemplateLoaderInterface.php',
        'Brain\\Hierarchy\\QueryTemplate' => __DIR__ . '/..' . '/brain/hierarchy/src/QueryTemplate.php',
        'Brain\\Hierarchy\\QueryTemplateInterface' => __DIR__ . '/..' . '/brain/hierarchy/src/QueryTemplateInterface.php',
        'Composer\\Installers\\AglInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/AglInstaller.php',
        'Composer\\Installers\\AimeosInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/AimeosInstaller.php',
        'Composer\\Installers\\AnnotateCmsInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/AnnotateCmsInstaller.php',
        'Composer\\Installers\\AsgardInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/AsgardInstaller.php',
        'Composer\\Installers\\AttogramInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/AttogramInstaller.php',
        'Composer\\Installers\\BaseInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/BaseInstaller.php',
        'Composer\\Installers\\BitrixInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/BitrixInstaller.php',
        'Composer\\Installers\\BonefishInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/BonefishInstaller.php',
        'Composer\\Installers\\CakePHPInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/CakePHPInstaller.php',
        'Composer\\Installers\\ChefInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ChefInstaller.php',
        'Composer\\Installers\\ClanCatsFrameworkInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ClanCatsFrameworkInstaller.php',
        'Composer\\Installers\\CockpitInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/CockpitInstaller.php',
        'Composer\\Installers\\CodeIgniterInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/CodeIgniterInstaller.php',
        'Composer\\Installers\\Concrete5Installer' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/Concrete5Installer.php',
        'Composer\\Installers\\CraftInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/CraftInstaller.php',
        'Composer\\Installers\\CroogoInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/CroogoInstaller.php',
        'Composer\\Installers\\DecibelInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/DecibelInstaller.php',
        'Composer\\Installers\\DokuWikiInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/DokuWikiInstaller.php',
        'Composer\\Installers\\DolibarrInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/DolibarrInstaller.php',
        'Composer\\Installers\\DrupalInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/DrupalInstaller.php',
        'Composer\\Installers\\ElggInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ElggInstaller.php',
        'Composer\\Installers\\EliasisInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/EliasisInstaller.php',
        'Composer\\Installers\\ExpressionEngineInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ExpressionEngineInstaller.php',
        'Composer\\Installers\\EzPlatformInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/EzPlatformInstaller.php',
        'Composer\\Installers\\FuelInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/FuelInstaller.php',
        'Composer\\Installers\\FuelphpInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/FuelphpInstaller.php',
        'Composer\\Installers\\GravInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/GravInstaller.php',
        'Composer\\Installers\\HuradInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/HuradInstaller.php',
        'Composer\\Installers\\ImageCMSInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ImageCMSInstaller.php',
        'Composer\\Installers\\Installer' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/Installer.php',
        'Composer\\Installers\\ItopInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ItopInstaller.php',
        'Composer\\Installers\\JoomlaInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/JoomlaInstaller.php',
        'Composer\\Installers\\KanboardInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/KanboardInstaller.php',
        'Composer\\Installers\\KirbyInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/KirbyInstaller.php',
        'Composer\\Installers\\KodiCMSInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/KodiCMSInstaller.php',
        'Composer\\Installers\\KohanaInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/KohanaInstaller.php',
        'Composer\\Installers\\LanManagementSystemInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/LanManagementSystemInstaller.php',
        'Composer\\Installers\\LaravelInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/LaravelInstaller.php',
        'Composer\\Installers\\LavaLiteInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/LavaLiteInstaller.php',
        'Composer\\Installers\\LithiumInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/LithiumInstaller.php',
        'Composer\\Installers\\MODULEWorkInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/MODULEWorkInstaller.php',
        'Composer\\Installers\\MODXEvoInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/MODXEvoInstaller.php',
        'Composer\\Installers\\MagentoInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/MagentoInstaller.php',
        'Composer\\Installers\\MakoInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/MakoInstaller.php',
        'Composer\\Installers\\MauticInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/MauticInstaller.php',
        'Composer\\Installers\\MayaInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/MayaInstaller.php',
        'Composer\\Installers\\MediaWikiInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/MediaWikiInstaller.php',
        'Composer\\Installers\\MicroweberInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/MicroweberInstaller.php',
        'Composer\\Installers\\MoodleInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/MoodleInstaller.php',
        'Composer\\Installers\\OctoberInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/OctoberInstaller.php',
        'Composer\\Installers\\OntoWikiInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/OntoWikiInstaller.php',
        'Composer\\Installers\\OsclassInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/OsclassInstaller.php',
        'Composer\\Installers\\OxidInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/OxidInstaller.php',
        'Composer\\Installers\\PPIInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/PPIInstaller.php',
        'Composer\\Installers\\PhiftyInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/PhiftyInstaller.php',
        'Composer\\Installers\\PhpBBInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/PhpBBInstaller.php',
        'Composer\\Installers\\PimcoreInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/PimcoreInstaller.php',
        'Composer\\Installers\\PiwikInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/PiwikInstaller.php',
        'Composer\\Installers\\PlentymarketsInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/PlentymarketsInstaller.php',
        'Composer\\Installers\\Plugin' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/Plugin.php',
        'Composer\\Installers\\PortoInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/PortoInstaller.php',
        'Composer\\Installers\\PrestashopInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/PrestashopInstaller.php',
        'Composer\\Installers\\PuppetInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/PuppetInstaller.php',
        'Composer\\Installers\\RadPHPInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/RadPHPInstaller.php',
        'Composer\\Installers\\ReIndexInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ReIndexInstaller.php',
        'Composer\\Installers\\RedaxoInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/RedaxoInstaller.php',
        'Composer\\Installers\\RoundcubeInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/RoundcubeInstaller.php',
        'Composer\\Installers\\SMFInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/SMFInstaller.php',
        'Composer\\Installers\\ShopwareInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ShopwareInstaller.php',
        'Composer\\Installers\\SilverStripeInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/SilverStripeInstaller.php',
        'Composer\\Installers\\SyDESInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/SyDESInstaller.php',
        'Composer\\Installers\\Symfony1Installer' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/Symfony1Installer.php',
        'Composer\\Installers\\TYPO3CmsInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/TYPO3CmsInstaller.php',
        'Composer\\Installers\\TYPO3FlowInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/TYPO3FlowInstaller.php',
        'Composer\\Installers\\TheliaInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/TheliaInstaller.php',
        'Composer\\Installers\\TuskInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/TuskInstaller.php',
        'Composer\\Installers\\UserFrostingInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/UserFrostingInstaller.php',
        'Composer\\Installers\\VanillaInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/VanillaInstaller.php',
        'Composer\\Installers\\VgmcpInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/VgmcpInstaller.php',
        'Composer\\Installers\\WHMCSInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/WHMCSInstaller.php',
        'Composer\\Installers\\WolfCMSInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/WolfCMSInstaller.php',
        'Composer\\Installers\\WordPressInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/WordPressInstaller.php',
        'Composer\\Installers\\YawikInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/YawikInstaller.php',
        'Composer\\Installers\\ZendInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ZendInstaller.php',
        'Composer\\Installers\\ZikulaInstaller' => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers/ZikulaInstaller.php',
        'Noodlehaus\\AbstractConfig' => __DIR__ . '/..' . '/hassankhan/config/src/AbstractConfig.php',
        'Noodlehaus\\Config' => __DIR__ . '/..' . '/hassankhan/config/src/Config.php',
        'Noodlehaus\\ConfigInterface' => __DIR__ . '/..' . '/hassankhan/config/src/ConfigInterface.php',
        'Noodlehaus\\ErrorException' => __DIR__ . '/..' . '/hassankhan/config/src/ErrorException.php',
        'Noodlehaus\\Exception' => __DIR__ . '/..' . '/hassankhan/config/src/Exception.php',
        'Noodlehaus\\Exception\\EmptyDirectoryException' => __DIR__ . '/..' . '/hassankhan/config/src/Exception/EmptyDirectoryException.php',
        'Noodlehaus\\Exception\\FileNotFoundException' => __DIR__ . '/..' . '/hassankhan/config/src/Exception/FileNotFoundException.php',
        'Noodlehaus\\Exception\\ParseException' => __DIR__ . '/..' . '/hassankhan/config/src/Exception/ParseException.php',
        'Noodlehaus\\Exception\\UnsupportedFormatException' => __DIR__ . '/..' . '/hassankhan/config/src/Exception/UnsupportedFormatException.php',
        'Noodlehaus\\FileParser\\AbstractFileParser' => __DIR__ . '/..' . '/hassankhan/config/src/FileParser/AbstractFileParser.php',
        'Noodlehaus\\FileParser\\FileParserInterface' => __DIR__ . '/..' . '/hassankhan/config/src/FileParser/FileParserInterface.php',
        'Noodlehaus\\FileParser\\Ini' => __DIR__ . '/..' . '/hassankhan/config/src/FileParser/Ini.php',
        'Noodlehaus\\FileParser\\Json' => __DIR__ . '/..' . '/hassankhan/config/src/FileParser/Json.php',
        'Noodlehaus\\FileParser\\Php' => __DIR__ . '/..' . '/hassankhan/config/src/FileParser/Php.php',
        'Noodlehaus\\FileParser\\Xml' => __DIR__ . '/..' . '/hassankhan/config/src/FileParser/Xml.php',
        'Noodlehaus\\FileParser\\Yaml' => __DIR__ . '/..' . '/hassankhan/config/src/FileParser/Yaml.php',
        'Sober\\Controller\\Controller' => __DIR__ . '/../..' . '/src/Controller.php',
        'Sober\\Controller\\Loader' => __DIR__ . '/../..' . '/src/Loader.php',
        'Sober\\Controller\\Module\\Debugger' => __DIR__ . '/../..' . '/src/Module/Debugger.php',
        'Sober\\Controller\\Module\\Parser' => __DIR__ . '/../..' . '/src/Module/Parser.php',
        'Sober\\Controller\\Module\\Tree' => __DIR__ . '/../..' . '/src/Module/Tree.php',
        'Symfony\\Component\\Yaml\\Command\\LintCommand' => __DIR__ . '/..' . '/symfony/yaml/Command/LintCommand.php',
        'Symfony\\Component\\Yaml\\Dumper' => __DIR__ . '/..' . '/symfony/yaml/Dumper.php',
        'Symfony\\Component\\Yaml\\Escaper' => __DIR__ . '/..' . '/symfony/yaml/Escaper.php',
        'Symfony\\Component\\Yaml\\Exception\\DumpException' => __DIR__ . '/..' . '/symfony/yaml/Exception/DumpException.php',
        'Symfony\\Component\\Yaml\\Exception\\ExceptionInterface' => __DIR__ . '/..' . '/symfony/yaml/Exception/ExceptionInterface.php',
        'Symfony\\Component\\Yaml\\Exception\\ParseException' => __DIR__ . '/..' . '/symfony/yaml/Exception/ParseException.php',
        'Symfony\\Component\\Yaml\\Exception\\RuntimeException' => __DIR__ . '/..' . '/symfony/yaml/Exception/RuntimeException.php',
        'Symfony\\Component\\Yaml\\Inline' => __DIR__ . '/..' . '/symfony/yaml/Inline.php',
        'Symfony\\Component\\Yaml\\Parser' => __DIR__ . '/..' . '/symfony/yaml/Parser.php',
        'Symfony\\Component\\Yaml\\Tag\\TaggedValue' => __DIR__ . '/..' . '/symfony/yaml/Tag/TaggedValue.php',
        'Symfony\\Component\\Yaml\\Unescaper' => __DIR__ . '/..' . '/symfony/yaml/Unescaper.php',
        'Symfony\\Component\\Yaml\\Yaml' => __DIR__ . '/..' . '/symfony/yaml/Yaml.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbd85dc5d1b1b947ae7afbf80e4f97684::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbd85dc5d1b1b947ae7afbf80e4f97684::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbd85dc5d1b1b947ae7afbf80e4f97684::$classMap;

        }, null, ClassLoader::class);
    }
}
