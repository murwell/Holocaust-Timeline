<?php

/**
 * webtrees: online genealogy
 * Copyright (C) 2019 webtrees development team
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

declare(strict_types=1);

use Fisharebest\Localization\Translation;
use Fisharebest\Webtrees\I18N;
use Fisharebest\Webtrees\Module\AbstractModule;
use Fisharebest\Webtrees\Module\ModuleCustomInterface;
use Fisharebest\Webtrees\Module\ModuleCustomTrait;
use Fisharebest\Webtrees\Module\ModuleHistoricEventsTrait;
use Fisharebest\Webtrees\Module\ModuleHistoricEventsInterface;
use Illuminate\Support\Collection;

/** 
 * Historical Holocaust Timeline
  */
return new class extends AbstractModule implements ModuleCustomInterface, ModuleHistoricEventsInterface {
    use ModuleCustomTrait;
    use ModuleHistoricEventsTrait;

    public const CUSTOM_TITLE = 'Holocaust Timeline';
    
    public const CUSTOM_WEBSITE = 'https://github.com/murwell/Holocuast-Timeline/';
    
    public const CUSTOM_VERSION = '1.0.0';

    /**
     * Constructor.  The constructor is called on *all* modules, even ones that are disabled.
     * This is a good place to load business logic ("services").  Type-hint the parameters and
     * they will be injected automatically.
     */
    public function __construct()
    {
        // NOTE:  If your module is dependent on any of the business logic ("services"),
        // then you would type-hint them in the constructor and let webtrees inject them
        // for you.  However, we can't use dependency injection on anonymous classes like
        // this one. For an example of this, see the example-server-configuration module.
    }

    /**
     * Bootstrap.  This function is called on *enabled* modules.
     * It is a good place to register routes and views.
     *
     * @return void
     */
    public function boot(): void
    {
    }

    /**
     * How should this module be identified in the control panel, etc.?
     *
     * @return string
     */
    public function title(): string
    {
        return self::CUSTOM_TITLE;
    }

        /**
     * The version of this module.
     *
     * @return string
     */
    public function customModuleVersion(): string
    {
        return self::CUSTOM_VERSION;
    }

    /**
     * Should this module be enabled when it is first installed?
     *
     * @return bool
     */
    public function isEnabledByDefault(): bool
    {
        return false;
    }

    /**
     * Where does this module store its resources
     *
     * @return string
     */
    public function resourcesFolder(): string
    {
        return __DIR__ . '/resources/';
    }
    
  
    /**
     * Structure of events provided by this module:
     * 
     * Each line is a GEDCOM style record to describe an event (EVEN), including newline chars (\n);
     *      1 EVEN <name> (<party>)
     *      2 TYPE <Chancellor|President> of Germany
     *      2 DATE <date period>
     *      2 NOTE [wikipedia de](<link>)
     *
     * markdown is used for NOTE;
     * markdown should be enabled for your tree (see Control panel / Manage family trees / Preferences and then scroll down to "Text" and mark the option "markdown");
     * is markdown is disabled the links are still working (blank at the end is necessary), but the formatting isn't so nice;
     */


    /**
     * All events provided by this module.
     *
     * @return Collection<string>
     */
    public function historicEventsAll(): Collection
    {
        return new Collection([
            "1 EVEN Germany Invades Belgium\n2 TYPE Occupation\n2 DATE @#DJULIAN@ 10 MAY 1940",
            "1 EVEN Germany Occupies Czechoslovakia\n2 TYPE Occupation\n2 DATE @#DJULIAN@ 15 MARCH 1939",
            "1 EVEN Russia Liberates Auschwitz\n2 TYPE Liberation\n2 DATE @#DJULIAN@ 27 JAN 1945",
            "1 EVEN Japan Bombs Pearl Harbor\n2 TYPE Attack\n2 DATE @#DJULIAN@ 7 DEC 1941",
            "1 EVEN D-Day, Allies Invade Normandy\n2 TYPE Attack\n2 DATE @#DJULIAN@ 6 JUN 1944",
            "1 EVEN Germany Occupies Hungary\n2 TYPE Occupation\n2 DATE @#DJULIAN@ 19 MARCH 1944",
            "1 EVEN Hitler Comes To Power\n2 TYPE Background\n2 DATE @#DJULIAN@ 01 JAN 1933",
            "1 EVEN Kristallnact\n2 TYPE Pogrom\n2 DATE FROM @#DJULIAN@ 09 NOV 1938 TO @#DJULIAN@ 10 NOV 1938\PLAC Germany\n2 NOTE Over 7,000 Jewish businesses were damaged or destroyed, and 30,000 Jewish men were arrested and incarcerated in concentration camps.",
            
        ]);
    }
}
