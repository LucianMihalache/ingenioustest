<?php

namespace App\Modules\Invoices\Api\Http;


use App\Infrastructure\Controller;
use App\Modules\Invoices\Application\Mapper\InvoiceResource;
use App\Modules\Invoices\Application\Service\InvoiceService;
use App\Modules\Invoices\Domain\Entities\Invoice;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class InvoiceController extends Controller
{
    /**
     * @param Invoice $invoice
     * @return InvoiceResource
     */
    public function show(Invoice $invoice): InvoiceResource
    {
        return new InvoiceResource($invoice);
    }

    /**
     * @param Invoice $invoice
     * @param InvoiceService $invoiceService
     * @return JsonResponse
     */
    public function approve(Invoice $invoice, InvoiceService $invoiceService): JsonResponse
    {
        try {
            $invoiceService->approve($invoice);
        } catch (\LogicException $e) {
            return response()->json([
                'message' => 'The given invoice is already processed.'
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Could not process.'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'message' => 'Invoice approved with success.'
        ]);
    }

    /**
     * @param Invoice $invoice
     * @param InvoiceService $invoiceService
     * @return JsonResponse
     */
    public function reject(Invoice $invoice, InvoiceService $invoiceService): JsonResponse
    {
        try {
            $invoiceService->reject($invoice);
        } catch (\LogicException $e) {
            return response()->json([
                'message' => 'The given invoice is already processed.'
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Could not process.'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->json([
            'message' => 'Invoice rejected with success.'
        ]);
    }
}
