<?php

class Sandfox_SitemapFix_Model_Resource_Catalog_Product extends Mage_Sitemap_Model_Resource_Catalog_Product
{
    public function getCollection($storeId)
    {
        $entities = parent::getCollection($storeId);

        if ($suffix = Mage::getStoreConfig(Mage_Catalog_Helper_Product::XML_PATH_PRODUCT_URL_SUFFIX, $storeId)) {
            while (list($key, $entity) = each($entities)) {
                /** @var Varien_Object $entity */
                $entities[$key] = $entity->setData('url', $entity->getData('url') . '.' . $suffix);
            }
        }

        return $entities;
    }
}