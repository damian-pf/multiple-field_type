<?php namespace Anomaly\MultipleFieldType\Command;

use Anomaly\MultipleFieldType\Tree\ValueTreeBuilder;
use Anomaly\Streams\Platform\Support\Hydrator;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class HydrateValueTree
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\MultipleFieldType\Command
 */
class HydrateValueTree implements SelfHandling
{

    use DispatchesJobs;

    /**
     * The value tree.
     *
     * @var ValueTreeBuilder
     */
    protected $tree;

    /**
     * Create a new HydrateValueTree instance.
     *
     * @param ValueTreeBuilder $tree
     */
    public function __construct(ValueTreeBuilder $tree)
    {
        $this->tree = $tree;
    }

    /**
     * Handle the command.
     *
     * @param Hydrator $hydrator
     */
    public function handle(Hydrator $hydrator)
    {
        if (!$definition = $this->dispatch(new GetValueDefinition($this->tree))) {
            return;
        }

        $hydrator->hydrate($this->tree, $definition);
    }
}
