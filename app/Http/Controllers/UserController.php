<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('users.index');
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function edit(string $id): View
    {
        return view('users.edit', [
            'userId' => $id,
            'user' => $this->mockUser($id),
        ]);
    }

    public function show(string $id): View
    {
        return view('users.show', ['userId' => $id]);
    }

    /**
     * @return array<string, mixed>
     */
    private function mockUser(string $id): array
    {
        $users = [
            'jp89023' => [
                'id' => 'jp89023',
                'init' => 'RS',
                'name' => 'Rahul Sharma',
                'business' => 'Sharma Distributors Pvt Ltd',
                'uid' => 'JP89023',
                'role' => 'Super Distributor',
                'parent' => 'Admin HQ',
                'mobile' => '+91 98765 10001',
                'email' => 'rahul.sharma@example.com',
                'address' => '12, MG Road, Koramangala',
                'state' => 'Karnataka',
                'city' => 'Bengaluru',
                'pincode' => '560034',
                'wallet_limit' => '500000',
                'commission_plan' => 'Gold Partner Plan',
                'status' => 'active',
            ],
            'jp89024' => [
                'id' => 'jp89024',
                'init' => 'PP',
                'name' => 'Priya Patel',
                'business' => 'Patel Trading Co.',
                'uid' => 'JP89024',
                'role' => 'Distributor',
                'parent' => 'Rahul Sharma',
                'mobile' => '+91 98765 10002',
                'email' => 'priya.patel@example.com',
                'address' => '45, Ring Road, Navrangpura',
                'state' => 'Gujarat',
                'city' => 'Ahmedabad',
                'pincode' => '380009',
                'wallet_limit' => '250000',
                'commission_plan' => 'Silver Partner Plan',
                'status' => 'active',
            ],
            'jp89025' => [
                'id' => 'jp89025',
                'init' => 'AK',
                'name' => 'Amit Kumar',
                'business' => 'Kumar Retail Hub',
                'uid' => 'JP89025',
                'role' => 'Retailer',
                'parent' => 'Priya Patel',
                'mobile' => '+91 98765 10003',
                'email' => 'amit.kumar@example.com',
                'address' => 'Shop 7, Sector 18 Market',
                'state' => 'Uttar Pradesh',
                'city' => 'Noida',
                'pincode' => '201301',
                'wallet_limit' => '50000',
                'commission_plan' => 'Retail Standard',
                'status' => 'suspended',
            ],
            'jp89026' => [
                'id' => 'jp89026',
                'init' => 'SR',
                'name' => 'Sneha Reddy',
                'business' => 'Reddy Mobile Point',
                'uid' => 'JP89026',
                'role' => 'Retailer',
                'parent' => 'Priya Patel',
                'mobile' => '+91 98765 10004',
                'email' => 'sneha.reddy@example.com',
                'address' => '88, Hitech City Main Rd',
                'state' => 'Telangana',
                'city' => 'Hyderabad',
                'pincode' => '500081',
                'wallet_limit' => '75000',
                'commission_plan' => 'Retail Standard',
                'status' => 'pending',
            ],
        ];

        return $users[strtolower($id)] ?? $users['jp89023'];
    }
}
