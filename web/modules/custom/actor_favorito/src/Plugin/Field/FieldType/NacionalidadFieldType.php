<?php

namespace Drupal\actor_favorito\Plugin\Field\FieldType;


use Drupal\Core\Annotation\Translation;
use Drupal\Core\Field\Annotation\FieldType;
use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;


/**
 * @FieldType(
 *     id = "nacionalidad_field_type",
 *     label = @Translation("Pais favorito del Author"),
 *     default_formatter = "nacionalidad_formatter",
 *     default_widget = "nacionalidad_widget"
 * )
 */
class NacionalidadFieldType extends FieldItemBase {

    /**
     * Defines field item properties.
     *
     * Properties that are required to constitute a valid, non-empty item should
     * be denoted with \Drupal\Core\TypedData\DataDefinition::setRequired().
     *
     * @return \Drupal\Core\TypedData\DataDefinitionInterface[]
     *   An array of property definitions of contained properties, keyed by
     *   property name.
     *
     * @see \Drupal\Core\Field\BaseFieldDefinition
     */
    public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition)
    {
        $properties['value'] = DataDefinition::create('string')
            ->setLabel(t('Country'));
        return $properties;
    }

    /**
     * Returns the schema for the field.
     *
     * This method is static because the field schema information is needed on
     * creation of the field. FieldItemInterface objects instantiated at that
     * time are not reliable as field settings might be missing.
     *
     * Computed fields having no schema should return an empty array.
     *
     * @param \Drupal\Core\Field\FieldStorageDefinitionInterface $field_definition
     *   The field definition.
     *
     * @return array
     */
    public static function schema(FieldStorageDefinitionInterface $field_definition)
    {
        return [
            'columns' => [
                'value' => [
                    'type' => 'varchar',
                    'description' => t('Favorite Country'),
                    'length' => 2,
                    'not null' => FALSE,
                ],
            ],
            'indexes' => [
                'value' => ['value'],
            ]
        ];
    }
}