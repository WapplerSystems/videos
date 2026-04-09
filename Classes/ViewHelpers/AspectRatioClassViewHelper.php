<?php
declare(strict_types=1);

/*
 * This file is part of the "videos" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */

namespace WapplerSystems\Videos\ViewHelpers;

use TYPO3\CMS\Core\Resource\FileInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class AspectRatioClassViewHelper extends AbstractViewHelper
{
    public function initializeArguments(): void
    {
        parent::initializeArguments();

        $this->registerArgument('aspectRatio', 'mixed', 'The desired aspect ratio, can either be a FileInterface instance or a string.', false);
        $this->registerArgument('default', 'string', 'If no valid aspectRatio is given, this value will be used.', false);
    }

    public function render(): string
    {
        $defaultValue = (string)($this->arguments['default'] ?? '16:9');
        $aspectRatio = $this->arguments['aspectRatio'] ?? $this->renderChildren();

        if (
            $aspectRatio instanceof FileInterface
            && $aspectRatio->hasProperty('aspect_ratio')
        ) {
            $aspectRatio = $aspectRatio->getProperty('aspect_ratio');
        }

        if (!is_string($aspectRatio) || empty($aspectRatio)) {
            $aspectRatio = $defaultValue;
        }

        $aspectRatio = str_replace(':', '-', $aspectRatio);

        return 'vjs-' . $aspectRatio;
    }
}