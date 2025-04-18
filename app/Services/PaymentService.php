<?php

namespace App\Services;

use App\Repositories\PaymentRepository;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PaymentService
{
    protected PaymentRepository $paymentRepository;

    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function getAllPayments(): Collection
    {
        return $this->paymentRepository->getAllPayments();
    }

    public function getPaymentsByHostel(int $hostelId): Collection
    {
        return $this->paymentRepository->getPaymentsByHostel($hostelId);
    }

    public function getPaymentsByBooking(int $bookingId): Collection
    {
        return $this->paymentRepository->getPaymentsByBooking($bookingId);
    }

    public function getPaginatedPayments(int $hostelId, int $perPage = 10): LengthAwarePaginator
    {
        return $this->paymentRepository->getPaginatedPayments($hostelId, $perPage);
    }

    public function findPaymentById(int $id): ?Payment
    {
        return $this->paymentRepository->findById($id);
    }

    public function createPayment(array $data): Payment
    {
        return $this->paymentRepository->create($data);
    }

    public function updatePayment(Payment $payment, array $data): bool
    {
        return $this->paymentRepository->update($payment, $data);
    }

    public function deletePayment(int $id): bool
    {
        return $this->paymentRepository->delete($id);
    }

    public function updatePaymentStatus(Payment $payment, string $status): void
    {
        $this->paymentRepository->updateStatus($payment, $status);
    }

    public function getTotalPaymentsForHostel(int $hostelId): float
    {
        return $this->paymentRepository->getTotalPayments($hostelId);
    }

    public function getPendingPaymentsForHostel(int $hostelId): Collection
    {
        return $this->paymentRepository->getPendingPayments($hostelId);
    }
}
