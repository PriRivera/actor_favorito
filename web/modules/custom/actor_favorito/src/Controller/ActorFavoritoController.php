<?php
    namespace Drupal\actor_favorito\Controller;

    class ActorFavoritoController
    {
        public function index()
        {
            //TODO: Mostrar el actor favorito aca
            return [
                '#theme'=> 'actor_favorito',
                '#title'=>'Tu actor favorito',
                '#actor'=> 'Brad Pitt'
            ];
        }
     }
