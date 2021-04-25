<?php

declare(strict_types=1);

namespace App\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

/**
 * @Constants
 */
class ErrorCode extends AbstractConstants
{
    /**
     * @Message("method not allowed")
     */
    public const METHOD_NOT_ALLOWED = 405;

    /**
     * @Message("not found")
     */
    public const NOT_FOUND = 404;

    /**
     * @Message("unprocessable entity")
     */
    public const UNPROCESSABLE_ENTITY = 422;

    //Unprocessable Entity
}
