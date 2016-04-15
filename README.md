# DateFormatterI18n

[![Build Status](https://travis-ci.org/heiglandreas/DateFormatterI18n.svg?branch=master)](https://travis-ci.org/heiglandreas/DateFormatterI18n)
[![Code Climate](https://codeclimate.com/github/heiglandreas/DateFormatterI18n/badges/gpa.svg)](https://codeclimate.com/github/heiglandreas/DateFormatterI18n)
[![Test Coverage](https://codeclimate.com/github/heiglandreas/DateFormatterI18n/badges/coverage.svg)](https://codeclimate.com/github/heiglandreas/DateFormatterI18n/coverage)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/heiglandreas/DateFormatterI18n/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/heiglandreas/DateFormatterI18n/?branch=master)


Extension to the [DateFormatter](https://github.com/heiglandreas/DateFormatter)-Library to add internationalised date formatting

## Installation

```bash
$ composer require org_heigl/date-formatter-i18n
```

## Usage


```php
use Org_Heigl\DateFormatter\DateFormatter as Formatter;
use Org_Heigl\DateFormatterI18n\Formatter\GenericDateTimeFormatter;
use Org_Heigl\DateFormatterI18n\IntlFactory;

$i18n = IntlFactory::create('de_DE');
$dateTimeFormatter = new GenericDateTimeFormatter('dd. MMM YYYY', $i18n);

$formatter = new Formatter($i18nFormatter);

$date = new DateTime('2013-12-03 12:23:34', new DateTimeZone('Europe/Berlin'));

echo $formatter->format($date);
// Prints "03. Dez. 2013"
```



