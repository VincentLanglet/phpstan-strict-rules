<?php declare(strict_types = 1);

namespace PHPStan\Rules\BooleansInConditions;

use PHPStan\Rules\BooleansInConditions\BooleanInWhileConditionRule;
use PHPStan\Rules\BooleansInConditions\BooleanRuleHelper;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleLevelHelper;
use PHPStan\Testing\RuleTestCase;

/**
 * @extends RuleTestCase<BooleanInWhileConditionRule>
 */
class BooleanInWhileConditionRuleTest extends RuleTestCase
{

	protected function getRule(): Rule
	{
		return new BooleanInWhileConditionRule(
			new BooleanRuleHelper(
				self::getContainer()->getByType(RuleLevelHelper::class),
			),
		);
	}

	public function testRule(): void
	{
		$this->analyse([__DIR__ . '/data/conditions.php'], [
			[
				'Only booleans are allowed in a while condition, string given.',
				55,
			],
		]);
	}

}
