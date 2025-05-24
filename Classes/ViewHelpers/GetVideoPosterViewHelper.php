<?php

namespace WapplerSystems\Videos\ViewHelpers;

use Doctrine\DBAL\ParameterType;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Resource\FileReference;
use TYPO3\CMS\Core\Resource\ResourceFactory;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class GetVideoPosterViewHelper extends AbstractViewHelper
{
    /**
     * Initialize arguments
     */
    public function initializeArguments(): void
    {
        $this->registerArgument('video', FileReference::class, 'The video file', true);
    }

    /**
     * Returns the sys_file_reference record
     *
     * @return array|null
     */
    public function render(): ?FileReference
    {
        /*  @var FileReference $video */
        $video = $this->arguments['video'];

        $metadata = $video->getOriginalFile()->getMetaData()->get();
        $fileUid = $metadata['uid'];

        $table = 'sys_file_metadata';
        $field = 'poster';

        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('sys_file_reference');
        $record = $queryBuilder
            ->select('*')
            ->from('sys_file_reference')
            ->where(
                $queryBuilder->expr()->eq('uid_foreign', $queryBuilder->createNamedParameter($fileUid, ParameterType::INTEGER)),
                $queryBuilder->expr()->eq('tablenames', $queryBuilder->createNamedParameter($table)),
                $queryBuilder->expr()->eq('fieldname', $queryBuilder->createNamedParameter($field)),
            )
            ->setMaxResults(1)
            ->executeQuery()
            ->fetchAssociative();

        if ($record) {
            return GeneralUtility::makeInstance(ResourceFactory::class)->getFileReferenceObject((int)$record['uid']);
        }

        return null;
    }
}
