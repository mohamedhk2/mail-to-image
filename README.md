<p align="center"><img src="https://user-images.githubusercontent.com/3965239/85176977-fc789c00-b272-11ea-96fa-9d275926f876.jpg"></p>

## About mailToImage

Convert email address to image to protect against spamming.

## Installation

```
composer require mohamedhk2/mail-to-image
```

## Usage

#### simple
```php
<?= mailToImage('mohamedhk2@mail-to-image.test') ?>
```
#### clickable  `mailto:`
`default: false`
```php
<?= mailToImage('mohamedhk2@mail-to-image.test', true) ?>
```
#### font size 
can be 1, 2, 3, 4, 5  
`default: 4`
```php
<?= mailToImage('mohamedhk2@mail-to-image.test', false, 4) ?>
```
#### text color
array(R, G, B)  
`default: [0, 0, 0]`
```php
<?= mailToImage('mohamedhk2@mail-to-image.test', false, 4, [0, 0, 0]) ?>
```
#### background color 
array(R, G, B)  
`default: [255, 255, 255]`
```php
<?= mailToImage('mohamedhk2@mail-to-image.test', false, 4, [0, 0, 0], [255, 255, 255]) ?>
```

#### Laravel

```blade
{!! mailToImage('mohamedhk2@mail-to-image.test') !!}
```

## Sponsors

<a href="https://github.com/INFINITY-IT"><img src="https://avatars3.githubusercontent.com/u/34744989?s=150&v=4"></a>