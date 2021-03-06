<?php
/**
 * SellerData
 *
 * PHP version 5
 *
 * @category Class
 * @package  Naranja\CheckoutApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */

/**
 * Ranty-sls
 *
 * Digital payments Tarjeta Naranja
 *
 * The version of the OpenAPI document: 3.0.0
 * Contact: you@your-company.com
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 4.2.2
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Naranja\CheckoutApi\Model;

use \ArrayAccess;
use \Naranja\CheckoutApi\ObjectSerializer;

/**
 * SellerData Class Doc Comment
 *
 * @category Class
 * @package  Naranja\CheckoutApi
 * @author   OpenAPI Generator team
 * @link     https://openapi-generator.tech
 */
class SellerData implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'sellerData';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'store_id' => 'string',
        'seller_id' => 'string',
        'pos_id' => 'string',
        'system' => 'string',
        'geocode' => 'string',
        'invoice_data' => 'object'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPIFormats = [
        'store_id' => null,
        'seller_id' => null,
        'pos_id' => null,
        'system' => null,
        'geocode' => null,
        'invoice_data' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'store_id' => 'store_id',
        'seller_id' => 'seller_id',
        'pos_id' => 'pos_id',
        'system' => 'system',
        'geocode' => 'geocode',
        'invoice_data' => 'invoice_data'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'store_id' => 'setStoreId',
        'seller_id' => 'setSellerId',
        'pos_id' => 'setPosId',
        'system' => 'setSystem',
        'geocode' => 'setGeocode',
        'invoice_data' => 'setInvoiceData'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'store_id' => 'getStoreId',
        'seller_id' => 'getSellerId',
        'pos_id' => 'getPosId',
        'system' => 'getSystem',
        'geocode' => 'getGeocode',
        'invoice_data' => 'getInvoiceData'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['store_id'] = isset($data['store_id']) ? $data['store_id'] : null;
        $this->container['seller_id'] = isset($data['seller_id']) ? $data['seller_id'] : null;
        $this->container['pos_id'] = isset($data['pos_id']) ? $data['pos_id'] : null;
        $this->container['system'] = isset($data['system']) ? $data['system'] : null;
        $this->container['geocode'] = isset($data['geocode']) ? $data['geocode'] : null;
        $this->container['invoice_data'] = isset($data['invoice_data']) ? $data['invoice_data'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['store_id'] === null) {
            $invalidProperties[] = "'store_id' can't be null";
        }
        if ($this->container['seller_id'] === null) {
            $invalidProperties[] = "'seller_id' can't be null";
        }
        if ($this->container['pos_id'] === null) {
            $invalidProperties[] = "'pos_id' can't be null";
        }
        if ($this->container['system'] === null) {
            $invalidProperties[] = "'system' can't be null";
        }
        if ($this->container['geocode'] === null) {
            $invalidProperties[] = "'geocode' can't be null";
        }
        if ($this->container['invoice_data'] === null) {
            $invalidProperties[] = "'invoice_data' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets store_id
     *
     * @return string
     */
    public function getStoreId()
    {
        return $this->container['store_id'];
    }

    /**
     * Sets store_id
     *
     * @param string $store_id store_id
     *
     * @return $this
     */
    public function setStoreId($store_id)
    {
        $this->container['store_id'] = $store_id;

        return $this;
    }

    /**
     * Gets seller_id
     *
     * @return string
     */
    public function getSellerId()
    {
        return $this->container['seller_id'];
    }

    /**
     * Sets seller_id
     *
     * @param string $seller_id seller_id
     *
     * @return $this
     */
    public function setSellerId($seller_id)
    {
        $this->container['seller_id'] = $seller_id;

        return $this;
    }

    /**
     * Gets pos_id
     *
     * @return string
     */
    public function getPosId()
    {
        return $this->container['pos_id'];
    }

    /**
     * Sets pos_id
     *
     * @param string $pos_id pos_id
     *
     * @return $this
     */
    public function setPosId($pos_id)
    {
        $this->container['pos_id'] = $pos_id;

        return $this;
    }

    /**
     * Gets system
     *
     * @return string
     */
    public function getSystem()
    {
        return $this->container['system'];
    }

    /**
     * Sets system
     *
     * @param string $system system
     *
     * @return $this
     */
    public function setSystem($system)
    {
        $this->container['system'] = $system;

        return $this;
    }

    /**
     * Gets geocode
     *
     * @return string
     */
    public function getGeocode()
    {
        return $this->container['geocode'];
    }

    /**
     * Sets geocode
     *
     * @param string $geocode geocode
     *
     * @return $this
     */
    public function setGeocode($geocode)
    {
        $this->container['geocode'] = $geocode;

        return $this;
    }

    /**
     * Gets invoice_data
     *
     * @return object
     */
    public function getInvoiceData()
    {
        return $this->container['invoice_data'];
    }

    /**
     * Sets invoice_data
     *
     * @param object $invoice_data invoice_data
     *
     * @return $this
     */
    public function setInvoiceData($invoice_data)
    {
        $this->container['invoice_data'] = $invoice_data;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


