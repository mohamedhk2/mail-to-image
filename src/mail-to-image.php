<?php
/**
 * @param string $string
 * @param bool $clickable
 * @param int $font
 * @param int[] $color
 * @param int[] $background
 *
 * @return string
 */
function mailToImage(string $string, bool $clickable = false, int $font = 4, array $color = [0, 0, 0], array $background = [255, 255, 255])
{
    if (empty($color)) $color = [0, 0, 0];
    if (empty($background)) $background = [255, 255, 255];
    if (is_null($font)) $font = 4;
    $e = $d = [];
    $parts = explode('@', $string);
    $part_1 = $parts[0] ?? null;
    $part_2 = $parts[1] ?? null;
    foreach (str_split("mailto:{$part_1}") as $char) $e[] = ord($char);
    foreach (str_split("@{$part_2}") as $char) $d[] = ord($char);
    $width = ImageFontWidth($font) * strlen($string);
    $height = ImageFontHeight($font);
    $im = @imagecreate($width, $height);
    imagecolorallocate($im, ...$background);
    $text_color = imagecolorallocate($im, ...$color);
    imagestring($im, $font, 0, 0, $string, $text_color);
    ob_start();
    imagejpeg($im);
    $imagejpeg = ob_get_contents();
    ob_end_clean();
    $imagedata = base64_encode($imagejpeg);
    $e = implode(',', $e);
    $d = implode(',', $d);
    return $clickable
        ? "<img src=\"data:image/jpeg;base64,{$imagedata}\" class=mti alt style=\"cursor: pointer;\" onclick=\"fcc=String.fromCharCode;window.location.href=fcc(...this.dataset.e.split(','))+fcc(...this.dataset.d.split(','));\" data-e=\"{$e}\" data-d=\"{$d}\" />"
        : "<img src=\"data:image/jpeg;base64,{$imagedata}\" class=mti alt />";
}
