<?php

namespace Drupal\actor_favorito\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Config\ConfigFactory;
use Drupal\Core\Session\AccountProxyInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
/**
 * Bloque de informacion
 *
 * @Block(
 *   id = "information_block",
 *   admin_label = @Translation("Bloque de informacion del actor favorito"),
 * )
 */

class InformationBlock extends BlockBase implements ContainerFactoryPluginInterface
{

    /**
     * @var AccountProxyInterface
     */
    protected $current_user;

    /**
     * @var ConfigFactory
     */
    protected $config_factory;

    public function __construct(array $configuration, $plugin_id, $plugin_definition, AccountProxyInterface $current_user, ConfigFactory $config_factory )
    {
        parent:: __construct($configuration, $plugin_id, $plugin_definition);

        $this->current_user= $current_user;
        $this->config_factory= $config_factory;
    }

    /**
     * @param ContainerInterface $container
     * @param array $configuration
     * @param string $plugin_id
     * @param mixed $plugin_definition
     * @return static
     */
    public static function create(
        ContainerInterface $container,
        array $configuration,
        $plugin_id,
        $plugin_definition
    )
    {
        //https://api.drupal.org/api/drupal/core!lib!Drupal!Core!Config!ConfigFactory.php/class/ConfigFactory/
        //https://api.drupal.org/api/drupal/core%21core.services.yml/service/current_user/8.8.x

        return new static (
            $configuration,
            $plugin_id,
            $plugin_definition,
            $container->get('current_user'),
            $container->get('config.factory')
        );
    }
    public function build(){
        $build = [];

        $config = $this->config_factory->get('actor_favorito.configuration');

        $actor= $config->get('actor_favorito');

        $build['information_block'] = [
          '#markup' => $this->t("Hola @user, tu actor favorito es: @actor",
          [
              '@user' => $this->current_user->getAccountName(),
              '@actor' => $actor,
          ]
        ),
        ];

        return $build;
    }
}