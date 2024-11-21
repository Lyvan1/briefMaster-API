<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class User extends \App\Entity\User implements \Doctrine\ORM\Proxy\InternalProxy
{
    use \Symfony\Component\VarExporter\LazyGhostTrait {
        initializeLazyObject as __load;
        setLazyObjectAsInitialized as public __setInitialized;
        isLazyObjectInitialized as private;
        createLazyGhost as private;
        resetLazyObject as private;
    }

    private const LAZY_OBJECT_PROPERTY_SCOPES = [
        "\0".parent::class."\0".'avatar' => [parent::class, 'avatar', null],
        "\0".parent::class."\0".'avatarFile' => [parent::class, 'avatarFile', null],
        "\0".parent::class."\0".'briefs' => [parent::class, 'briefs', null],
        "\0".parent::class."\0".'company' => [parent::class, 'company', null],
        "\0".parent::class."\0".'createdAt' => [parent::class, 'createdAt', null],
        "\0".parent::class."\0".'email' => [parent::class, 'email', null],
        "\0".parent::class."\0".'firstname' => [parent::class, 'firstname', null],
        "\0".parent::class."\0".'id' => [parent::class, 'id', null],
        "\0".parent::class."\0".'imageSize' => [parent::class, 'imageSize', null],
        "\0".parent::class."\0".'lastname' => [parent::class, 'lastname', null],
        "\0".parent::class."\0".'password' => [parent::class, 'password', null],
        "\0".parent::class."\0".'roles' => [parent::class, 'roles', null],
        "\0".parent::class."\0".'task' => [parent::class, 'task', null],
        "\0".parent::class."\0".'updatedAt' => [parent::class, 'updatedAt', null],
        'avatar' => [parent::class, 'avatar', null],
        'avatarFile' => [parent::class, 'avatarFile', null],
        'avatarUrl' => [parent::class, 'avatarUrl', null],
        'briefs' => [parent::class, 'briefs', null],
        'company' => [parent::class, 'company', null],
        'createdAt' => [parent::class, 'createdAt', null],
        'email' => [parent::class, 'email', null],
        'firstname' => [parent::class, 'firstname', null],
        'id' => [parent::class, 'id', null],
        'imageSize' => [parent::class, 'imageSize', null],
        'lastname' => [parent::class, 'lastname', null],
        'logoBase64' => [parent::class, 'logoBase64', null],
        'password' => [parent::class, 'password', null],
        'roles' => [parent::class, 'roles', null],
        'task' => [parent::class, 'task', null],
        'updatedAt' => [parent::class, 'updatedAt', null],
    ];

    public function __isInitialized(): bool
    {
        return isset($this->lazyObjectState) && $this->isLazyObjectInitialized();
    }

    public function __serialize(): array
    {
        $properties = (array) $this;
        unset($properties["\0" . self::class . "\0lazyObjectState"]);

        return $properties;
    }
}