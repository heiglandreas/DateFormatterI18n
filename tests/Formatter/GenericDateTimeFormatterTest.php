<?php
/**
 * Copyright (c) 2016-2016} Andreas Heigl<andreas@heigl.org>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @author    Andreas Heigl<andreas@heigl.org>
 * @copyright 2016-2016 Andreas Heigl
 * @license   http://www.opensource.org/licenses/mit-license.php MIT-License
 * @version   0.0
 * @since     14.04.2016
 * @link      http://github.com/heiglandreas/DateFormatterI18n
 */

namespace Org_HeiglTest\DateFormatterI18n\Formatter;

use Org_Heigl\DateFormatterI18n\Formatter\GenericDateTimeFormatter;

class GenericDateTimeFormatterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider formattingWorksAsExpectedProvider
     */
    public function testThatFormattingWorksAsExpected($locale, $datetime, $format, $expected)
    {
        $i18n = new \IntlDateFormatter($locale, NULL, NULL, 'UTC', NULL);

        $dateTimeFormatter = new GenericDateTimeFormatter($format, $i18n);

        $this->assertEquals($expected, $dateTimeFormatter->format($datetime));

    }

    public function formattingWorksAsExpectedProvider()
    {
        return [
            ['de_DE', new \Datetime('2013-12-23 12:23:34', new \DateTimeZone('Europe/Berlin')), 'dd. MMM YYYY', '23. Dez. 2013'],
            ['de_DE', new \Datetime('2013-12-23 12:23:34', new \DateTimeZone('Europe/Busingen')), 'dd. MMM YYYY', '23. Dez. 2013'],
            ['en_US', new \Datetime('2013-12-23 12:23:34', new \DateTimeZone('America/Chicago')), 'dd. MMM YYYY', '23. Dec 2013'],
            ['de_DE', new \Datetime('2013-12-23 12:23:34', new \DateTimeZone('Europe/Berlin')), 'dd. MMMM YYYY', '23. Dezember 2013'],
            ['en_US', new \Datetime('2013-12-23 12:23:34', new \DateTimeZone('America/Chicago')), 'dd. MMMM YYYY', '23. December 2013'],
            ['no', new \Datetime('2013-12-23 12:23:34', new \DateTimeZone('Europe/Berlin')), 'dd. MMMM YYYY', '23. desember 2013'],
            ['de_AU', new \Datetime('2013-01-23 12:23:34', new \DateTimeZone('Europe/Vienna')), 'dd. MMMM YYYY', '23. Januar 2013'],
            ['el_GR', new \Datetime('2013-01-23 12:23:34', new \DateTimeZone('Europe/Athens')), 'dd. MMMM YYYY', '23. Ιανουαρίου 2013'],
            ['de_DE', new \Datetime('2013-12-23 12:23:34', new \DateTimeZone('Europe/Berlin')), 'dd. MMM YYYY HH:mm', '23. Dez. 2013 12:23'],
            ['en_US', new \Datetime('2013-12-23 12:23:34', new \DateTimeZone('America/Chicago')), 'dd. MMM YYYY HH:mm', '23. Dec 2013 12:23'],
            ['de_DE', new \Datetime('2013-12-23 12:23:34', new \DateTimeZone('Europe/Berlin')), 'EE dd. MMMM YYYY', 'Mo. 23. Dezember 2013'],
            ['en_US', new \Datetime('2013-12-23 12:23:34', new \DateTimeZone('America/Chicago')), 'EE dd. MMMM YYYY', 'Mon 23. December 2013'],
            ['el_GR', new \Datetime('2013-01-23 12:23:34', new \DateTimeZone('Europe/Athens')), 'EE dd. MMMM YYYY', 'Τετ 23. Ιανουαρίου 2013'],
            ['de_DE', new \Datetime('2013-12-23 12:23:34', new \DateTimeZone('Europe/Berlin')), 'EEEE dd. MMMM YYYY', 'Montag 23. Dezember 2013'],
            ['en_US', new \Datetime('2013-12-23 12:23:34', new \DateTimeZone('America/Chicago')), 'EEEE dd. MMMM YYYY', 'Monday 23. December 2013'],
            ['el_GR', new \Datetime('2013-01-23 12:23:34', new \DateTimeZone('Europe/Athens')), 'EEEE dd. MMMM YYYY', 'Τετάρτη 23. Ιανουαρίου 2013'],
            ['de_DE', new \DatetimeImmutable('2013-12-23 12:23:34', new \DateTimeZone('Europe/Berlin')), 'dd. MMM YYYY', '23. Dez. 2013'],
            ['de_DE', new \DatetimeImmutable('2013-12-23 12:23:34', new \DateTimeZone('Europe/Busingen')), 'dd. MMM YYYY', '23. Dez. 2013'],
            ['en_US', new \DatetimeImmutable('2013-12-23 12:23:34', new \DateTimeZone('America/Chicago')), 'dd. MMM YYYY', '23. Dec 2013'],
            ['de_DE', new \DatetimeImmutable('2013-12-23 12:23:34', new \DateTimeZone('Europe/Berlin')), 'dd. MMMM YYYY', '23. Dezember 2013'],
            ['en_US', new \DatetimeImmutable('2013-12-23 12:23:34', new \DateTimeZone('America/Chicago')), 'dd. MMMM YYYY', '23. December 2013'],
            ['no', new \DatetimeImmutable('2013-12-23 12:23:34', new \DateTimeZone('Europe/Berlin')), 'dd. MMMM YYYY', '23. desember 2013'],
            ['de_AU', new \DatetimeImmutable('2013-01-23 12:23:34', new \DateTimeZone('Europe/Vienna')), 'dd. MMMM YYYY', '23. Januar 2013'],
            ['el_GR', new \DatetimeImmutable('2013-01-23 12:23:34', new \DateTimeZone('Europe/Athens')), 'dd. MMMM YYYY', '23. Ιανουαρίου 2013'],
            ['de_DE', new \DatetimeImmutable('2013-12-23 12:23:34', new \DateTimeZone('Europe/Berlin')), 'dd. MMM YYYY HH:mm', '23. Dez. 2013 12:23'],
            ['en_US', new \DatetimeImmutable('2013-12-23 12:23:34', new \DateTimeZone('America/Chicago')), 'dd. MMM YYYY HH:mm', '23. Dec 2013 12:23'],
            ['de_DE', new \DatetimeImmutable('2013-12-23 12:23:34', new \DateTimeZone('Europe/Berlin')), 'EE dd. MMMM YYYY', 'Mo. 23. Dezember 2013'],
            ['en_US', new \DatetimeImmutable('2013-12-23 12:23:34', new \DateTimeZone('America/Chicago')), 'EE dd. MMMM YYYY', 'Mon 23. December 2013'],
            ['el_GR', new \DatetimeImmutable('2013-01-23 12:23:34', new \DateTimeZone('Europe/Athens')), 'EE dd. MMMM YYYY', 'Τετ 23. Ιανουαρίου 2013'],
            ['de_DE', new \DatetimeImmutable('2013-12-23 12:23:34', new \DateTimeZone('Europe/Berlin')), 'EEEE dd. MMMM YYYY', 'Montag 23. Dezember 2013'],
            ['en_US', new \DatetimeImmutable('2013-12-23 12:23:34', new \DateTimeZone('America/Chicago')), 'EEEE dd. MMMM YYYY', 'Monday 23. December 2013'],
            ['el_GR', new \DatetimeImmutable('2013-01-23 12:23:34', new \DateTimeZone('Europe/Athens')), 'EEEE dd. MMMM YYYY', 'Τετάρτη 23. Ιανουαρίου 2013'],
        ];
    }

    public function testThatDateTimeInterfaceInstancesAreConvertedToDateTime()
    {
        $formatter = new GenericDateTimeFormatter('dd. MMM YYYY', new \IntlDateFormatter('de_DE', NULL, NULL, 'UTC', NULL));
        $date = new \DateTime('2013-12-23 14:23:34', new \DateTimeZone('Europe/Berlin'));

        $this->assertEquals($date, $formatter->makeDateTime($date));
        $this->assertEquals($date, $formatter->makeDateTime(new \DateTimeImmutable('2013-12-23 14:23:34', new \DateTimeZone('Europe/Berlin'))));
    }

    public function testThatGEtFormatReturnsEmptyArray()
    {
        $this->assertEmpty(GenericDateTimeFormatter::getFormatString());
    }
}
