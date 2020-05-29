<?php

namespace Drupal\actor_favorito\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class CargarController.
 */
class CargarController extends ControllerBase {

  /**
   * Index.
   *
   * @return string
   */
  public function index()
  {
    $items = [
			[
				'name' => $this->t('Priscilla'),
				'subtitle' => $this->t('La pri'),
				'text' => $this->t('Bacon ipsum dolor amet doner pig ham hock jowl pork loin. Beef pig rump brisket, t-bone buffalo chicken landjaeger salami shoulder. Sirloin pork belly shank bacon prosciutto beef ribs short loin kielbasa andouille chislic sausage pastrami turkey. Pork biltong burgdoggen sausage drumstick. Rump alcatra tail, pig picanha chuck landjaeger doner jowl ball tip bacon strip steak prosciutto frankfurter tri-tip.'),
			],
			[
				'name' => $this->t('Hiram'),
				'subtitle' => $this->t('El arabe'),
				'text' => $this->t('Bacon ipsum dolor amet doner pig ham hock jowl pork loin. Beef pig rump brisket, t-bone buffalo chicken landjaeger salami shoulder. Sirloin pork belly shank bacon prosciutto beef ribs short loin kielbasa andouille chislic sausage pastrami turkey. Pork biltong burgdoggen sausage drumstick. Rump alcatra tail, pig picanha chuck landjaeger doner jowl ball tip bacon strip steak prosciutto frankfurter tri-tip.'),
			],
			[
				'name' => $this->t('Jean Carlos'),
				'subtitle' => $this->t('Hindu'),
				'text' => $this->t('Bacon ipsum dolor amet doner pig ham hock jowl pork loin. Beef pig rump brisket, t-bone buffalo chicken landjaeger salami shoulder. Sirloin pork belly shank bacon prosciutto beef ribs short loin kielbasa andouille chislic sausage pastrami turkey. Pork biltong burgdoggen sausage drumstick. Rump alcatra tail, pig picanha chuck landjaeger doner jowl ball tip bacon strip steak prosciutto frankfurter tri-tip.'),
			],
		];

    $build = [
			'#prefix' => '<div class="container">',
			'#suffix' => '</div>',
			'items' => [],
			'#attached' => [
				'library' => [
					'actor_favorito/actor_favorito',
					'actor_favorito/axios',
					'actor_favorito/fontawesome',
				]
			]
		];

		foreach ($items as $item) {
			$build['items'][] = [
				'#theme' => 'load_animation',
				'#name' => $item['name'],
				'#subtitle' => $item['subtitle'],
				'#text' => $item['text'],
			];
		}

		return $build;
	}

}
