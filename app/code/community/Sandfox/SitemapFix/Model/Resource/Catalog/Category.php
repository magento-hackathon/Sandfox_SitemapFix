<?php

class Sandfox_SitemapFix_Model_Resource_Catalog_Category extends Mage_Sitemap_Model_Resource_Catalog_Category
{
    public function getCollection($storeId)
    {
        $entities = parent::getCollection($storeId);

        if ($suffix = Mage::getStoreConfig(Mage_Catalog_Helper_Category::XML_PATH_CATEGORY_URL_SUFFIX, $storeId)) {
            while (list($key, $entity) = each($entities)) {
                /** @var Varien_Object $entity */
                $entities[$key] = $entity->setData('url', $entity->getData('url') . '.' . $suffix);
            }
        }

        return $entities;
    }
}