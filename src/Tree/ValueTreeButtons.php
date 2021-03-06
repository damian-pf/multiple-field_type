<?php namespace Anomaly\MultipleFieldType\Tree;

use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class ValueTreeButtons
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\MultipleFieldType\Tree
 */
class ValueTreeButtons implements SelfHandling
{

    /**
     * Handle the command.
     *
     * @param ValueTreeBuilder $builder
     */
    public function handle(ValueTreeBuilder $builder)
    {
        $builder->setButtons(
            [
                'remove' => [
                    'data-dismiss' => 'multiple',
                    'data-entry'   => 'entry.id'
                ]
            ]
        );
    }
}
