<?php

namespace App\Modules\Invoices\Application\Service;

use App\Domain\Enums\StatusEnum;
use App\Modules\Approval\Api\ApprovalFacadeInterface;
use App\Modules\Approval\Api\Dto\ApprovalDto;
use App\Modules\Invoices\Domain\Entities\Invoice;
use LogicException;
use Ramsey\Uuid\Uuid;

class InvoiceService
{
    public function __construct(
        private readonly ApprovalFacadeInterface $approvalFacade
    ) {}

    /**
     * @param Invoice $invoice
     * @return void
     * @throws LogicException
     */
    public function approve(Invoice $invoice): void
    {
        $approvalDto = new ApprovalDto(Uuid::fromString($invoice->id), $invoice->status, 'invoice');
        $this->approvalFacade->approve($approvalDto);
        $invoice->update([
            'status' => StatusEnum::APPROVED
        ]);
    }

    /**
     * @param Invoice $invoice
     * @return void
     * @throws LogicException
     */
    public function reject(Invoice $invoice): void
    {
        $approvalDto = new ApprovalDto(Uuid::fromString($invoice->id), $invoice->status, 'invoice');
        $this->approvalFacade->reject($approvalDto);
        $invoice->update([
            'status' => StatusEnum::REJECTED
        ]);
    }
}
