<?php
/**
 * SigningGroup
 *
 * PHP version 7.4
 *
 * @category Class
 * @package  DocuSign\eSign
 * @author   Swagger Codegen team <apihelp@docusign.com>
 * @license  The DocuSign PHP Client SDK is licensed under the MIT License.
 * @link     https://github.com/swagger-api/swagger-codegen
 */

/**
 * DocuSign REST API
 *
 * The DocuSign REST API provides you with a powerful, convenient, and simple Web services API for interacting with DocuSign.
 *
 * OpenAPI spec version: v2.1
 * Contact: devcenter@docusign.com
 * Generated by: https://github.com/swagger-api/swagger-codegen.git
 * Swagger Codegen version: 2.4.21
 */

/**
 * NOTE: This class is auto generated by the swagger code generator program.
 * https://github.com/swagger-api/swagger-codegen
 * Do not edit the class manually.
 */

namespace DocuSign\eSign\Model;

use \ArrayAccess;
use DocuSign\eSign\ObjectSerializer;

/**
 * SigningGroup Class Doc Comment
 *
 * @category    Class
 * @description Contains details about a signing group. Signing groups enable you to send an envelope to a predefined group of recipients and have any one member of the group sign your documents. When you send an envelope to a signing group, anyone in the group can open it and sign it with their own signature.
 * @package     DocuSign\eSign
 * @author      Swagger Codegen team <apihelp@docusign.com>
 * @license     The DocuSign PHP Client SDK is licensed under the MIT License.
 * @link        https://github.com/swagger-api/swagger-codegen
 */
class SigningGroup implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'signingGroup';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'created' => '?string',
        'created_by' => '?string',
        'error_details' => '\DocuSign\eSign\Model\ErrorDetails',
        'group_email' => '?string',
        'group_name' => '?string',
        'group_type' => '?string',
        'modified' => '?string',
        'modified_by' => '?string',
        'signing_group_id' => '?string',
        'users' => '\DocuSign\eSign\Model\SigningGroupUser[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'created' => null,
        'created_by' => null,
        'error_details' => null,
        'group_email' => null,
        'group_name' => null,
        'group_type' => null,
        'modified' => null,
        'modified_by' => null,
        'signing_group_id' => null,
        'users' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'created' => 'created',
        'created_by' => 'createdBy',
        'error_details' => 'errorDetails',
        'group_email' => 'groupEmail',
        'group_name' => 'groupName',
        'group_type' => 'groupType',
        'modified' => 'modified',
        'modified_by' => 'modifiedBy',
        'signing_group_id' => 'signingGroupId',
        'users' => 'users'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'created' => 'setCreated',
        'created_by' => 'setCreatedBy',
        'error_details' => 'setErrorDetails',
        'group_email' => 'setGroupEmail',
        'group_name' => 'setGroupName',
        'group_type' => 'setGroupType',
        'modified' => 'setModified',
        'modified_by' => 'setModifiedBy',
        'signing_group_id' => 'setSigningGroupId',
        'users' => 'setUsers'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'created' => 'getCreated',
        'created_by' => 'getCreatedBy',
        'error_details' => 'getErrorDetails',
        'group_email' => 'getGroupEmail',
        'group_name' => 'getGroupName',
        'group_type' => 'getGroupType',
        'modified' => 'getModified',
        'modified_by' => 'getModifiedBy',
        'signing_group_id' => 'getSigningGroupId',
        'users' => 'getUsers'
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
        return self::$swaggerModelName;
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
        $this->container['created'] = isset($data['created']) ? $data['created'] : null;
        $this->container['created_by'] = isset($data['created_by']) ? $data['created_by'] : null;
        $this->container['error_details'] = isset($data['error_details']) ? $data['error_details'] : null;
        $this->container['group_email'] = isset($data['group_email']) ? $data['group_email'] : null;
        $this->container['group_name'] = isset($data['group_name']) ? $data['group_name'] : null;
        $this->container['group_type'] = isset($data['group_type']) ? $data['group_type'] : null;
        $this->container['modified'] = isset($data['modified']) ? $data['modified'] : null;
        $this->container['modified_by'] = isset($data['modified_by']) ? $data['modified_by'] : null;
        $this->container['signing_group_id'] = isset($data['signing_group_id']) ? $data['signing_group_id'] : null;
        $this->container['users'] = isset($data['users']) ? $data['users'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

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
     * Gets created
     *
     * @return ?string
     */
    public function getCreated()
    {
        return $this->container['created'];
    }

    /**
     * Sets created
     *
     * @param ?string $created 
     *
     * @return $this
     */
    public function setCreated($created)
    {
        $this->container['created'] = $created;

        return $this;
    }

    /**
     * Gets created_by
     *
     * @return ?string
     */
    public function getCreatedBy()
    {
        return $this->container['created_by'];
    }

    /**
     * Sets created_by
     *
     * @param ?string $created_by 
     *
     * @return $this
     */
    public function setCreatedBy($created_by)
    {
        $this->container['created_by'] = $created_by;

        return $this;
    }

    /**
     * Gets error_details
     *
     * @return \DocuSign\eSign\Model\ErrorDetails
     */
    public function getErrorDetails()
    {
        return $this->container['error_details'];
    }

    /**
     * Sets error_details
     *
     * @param \DocuSign\eSign\Model\ErrorDetails $error_details Array or errors.
     *
     * @return $this
     */
    public function setErrorDetails($error_details)
    {
        $this->container['error_details'] = $error_details;

        return $this;
    }

    /**
     * Gets group_email
     *
     * @return ?string
     */
    public function getGroupEmail()
    {
        return $this->container['group_email'];
    }

    /**
     * Sets group_email
     *
     * @param ?string $group_email 
     *
     * @return $this
     */
    public function setGroupEmail($group_email)
    {
        $this->container['group_email'] = $group_email;

        return $this;
    }

    /**
     * Gets group_name
     *
     * @return ?string
     */
    public function getGroupName()
    {
        return $this->container['group_name'];
    }

    /**
     * Sets group_name
     *
     * @param ?string $group_name The name of the group.
     *
     * @return $this
     */
    public function setGroupName($group_name)
    {
        $this->container['group_name'] = $group_name;

        return $this;
    }

    /**
     * Gets group_type
     *
     * @return ?string
     */
    public function getGroupType()
    {
        return $this->container['group_type'];
    }

    /**
     * Sets group_type
     *
     * @param ?string $group_type 
     *
     * @return $this
     */
    public function setGroupType($group_type)
    {
        $this->container['group_type'] = $group_type;

        return $this;
    }

    /**
     * Gets modified
     *
     * @return ?string
     */
    public function getModified()
    {
        return $this->container['modified'];
    }

    /**
     * Sets modified
     *
     * @param ?string $modified 
     *
     * @return $this
     */
    public function setModified($modified)
    {
        $this->container['modified'] = $modified;

        return $this;
    }

    /**
     * Gets modified_by
     *
     * @return ?string
     */
    public function getModifiedBy()
    {
        return $this->container['modified_by'];
    }

    /**
     * Sets modified_by
     *
     * @param ?string $modified_by 
     *
     * @return $this
     */
    public function setModifiedBy($modified_by)
    {
        $this->container['modified_by'] = $modified_by;

        return $this;
    }

    /**
     * Gets signing_group_id
     *
     * @return ?string
     */
    public function getSigningGroupId()
    {
        return $this->container['signing_group_id'];
    }

    /**
     * Sets signing_group_id
     *
     * @param ?string $signing_group_id When set to **true** and the feature is enabled in the sender's account, the signing recipient is required to draw signatures and initials at each signature/initial tab ( instead of adopting a signature/initial style or only drawing a signature/initial once).
     *
     * @return $this
     */
    public function setSigningGroupId($signing_group_id)
    {
        $this->container['signing_group_id'] = $signing_group_id;

        return $this;
    }

    /**
     * Gets users
     *
     * @return \DocuSign\eSign\Model\SigningGroupUser[]
     */
    public function getUsers()
    {
        return $this->container['users'];
    }

    /**
     * Sets users
     *
     * @param \DocuSign\eSign\Model\SigningGroupUser[] $users 
     *
     * @return $this
     */
    public function setUsers($users)
    {
        $this->container['users'] = $users;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    #[\ReturnTypeWillChange]
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
    #[\ReturnTypeWillChange]
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
    #[\ReturnTypeWillChange]
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
    #[\ReturnTypeWillChange]
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
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}

