<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HostelController,
    RoomController,
    BookingController,
    PaymentController,
    DashboardController
};

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Shared Routes (accessible by both roles)
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings', [BookingController::class, 'getAllBookings'])->name('bookings.all');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/{payment}', [PaymentController::class, 'show'])->name('payments.show');

    
    
    // Student Routes
    // Route::middleware(['student'])->group(function () {
        // Browse Hostels
        Route::get('/hostels/browse', [HostelController::class, 'browse'])->name('hostels.browse');
        Route::get('/hostels/{hostel}/details', [HostelController::class, 'details'])->name('hostels.details');

        // Bookings
        Route::get('/bookings/create/{hostel}', [BookingController::class, 'create'])->name('bookings.create');
        Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
        Route::get('/bookings/{hostel}/hostel', [BookingController::class, 'getBookingByHostel'])->name('bookings.hostel');
        Route::post('/bookings/{booking}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');

        // Payments
        Route::get('/payments/{booking}/pay', [PaymentController::class, 'createForBooking'])->name('payments.booking.create');
    // });
    // // Hostel Manager Routes
    // Route::middleware(['hostel_manager'])->group(function () {
        // Hostels
        Route::get('/hostels', [HostelController::class, 'index'])->name('hostels.index');
        Route::get('/hostels/create', [HostelController::class, 'create'])->name('hostels.create');
        Route::post('/hostels', [HostelController::class, 'store'])->name('hostels.store');
        Route::get('/hostels/{hostel}', [HostelController::class, 'show'])->name('hostels.show');
        Route::get('/hostels/{hostel}/edit', [HostelController::class, 'edit'])->name('hostels.edit');
        Route::put('/hostels/{hostel}', [HostelController::class, 'update'])->name('hostels.update');
        Route::delete('/hostels/{hostel}', [HostelController::class, 'destroy'])->name('hostels.destroy');
        Route::get('/hostels/{hostel}/rooms', [HostelController::class, 'rooms'])->name('hostels.rooms');
        Route::get('/hostels/{hostel}/bookings', [HostelController::class, 'bookings'])->name('hostels.bookings');
        Route::get('/hostels/{hostel}/payments', [HostelController::class, 'payments'])->name('hostels.payments');

        // Rooms
        Route::get('/rooms/{hostel}/hostel', [RoomController::class, 'index'])->name('rooms.index');
        Route::get('/rooms/create/{hostel}', [RoomController::class, 'create'])->name('rooms.create');
        Route::post('/rooms/{hostel}/hostel', [RoomController::class, 'store'])->name('rooms.store');
        Route::get('/rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');
        Route::get('/rooms/{room}/edit', [RoomController::class, 'edit'])->name('rooms.edit');
        Route::put('/rooms/{room}', [RoomController::class, 'update'])->name('rooms.update');
        Route::delete('/rooms/{room}', [RoomController::class, 'destroy'])->name('rooms.destroy');
        Route::post('/rooms/{room}/status', [RoomController::class, 'updateStatus'])->name('rooms.status.update');
        Route::get('/rooms/{room}/availability', [RoomController::class, 'checkAvailability'])->name('rooms.availability');

        // Bookings Management
        Route::get('/bookings/pending', [BookingController::class, 'pending'])->name('bookings.pending');
        Route::post('/bookings/{booking}/approve', [BookingController::class, 'approve'])->name('bookings.approve');
        Route::post('/bookings/{booking}/reject', [BookingController::class, 'reject'])->name('bookings.reject');

        // Payments Management
        Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
        Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
        Route::get('/payments/pending', [PaymentController::class, 'pending'])->name('payments.pending');
        Route::post('/payments/{payment}/confirm', [PaymentController::class, 'confirm'])->name('payments.confirm');
    // });
});
require __DIR__.'/auth.php';
