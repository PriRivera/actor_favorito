<?php

namespace Drupal\actor_favorito\Plugin\Field\FieldWidget;

use Drupal\Core\Annotation\Translation;
use Drupal\Core\Field\Annotation\FieldWidget;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;


/**
 * @FieldWidget(
 *     id = "nacionalidad_widget",
 *     label = @Translation("Pais favorito del Author"),
 *     field_types = {
 *          "nacionalidad_field_type"
 *     }
 * )
 */
class NacionalidadWidget extends WidgetBase {

    /**
     * @param \Drupal\Core\Field\FieldItemListInterface $items
     *   Array of default values for this field.
     * @param int $delta
     *   The order of this item in the array of sub-elements (0, 1, 2, etc.).
     * @param array $element
     * @param array $form
     *   The form structure where widgets are being attached to. This might be a
     *   full form structure, or a sub-element of a larger form.
     * @param \Drupal\Core\Form\FormStateInterface $form_state
     *   The current state of the form.
     *
     * @return array
     *   The form elements for a single widget for this field.
     *
     * @see hook_field_widget_form_alter()
     * @see hook_field_widget_WIDGET_TYPE_form_alter()
     */
    public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state)
    {
        $elements = [];

        $elements['value'] = [
            '#type' => 'select',
            '#options' => \Drupal::service('country_manager')->getList(),
            '#title' => t('Elegi el país favorito del author')
        ];

        return $elements;
    }
}