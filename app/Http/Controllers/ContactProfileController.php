<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactProfile;

class ContactProfileController extends Controller
{
    public function index(Request $request)
    {
        $contactProfiles = ContactProfile::all();

        $editingContact = null;
        if ($request->has('edit')) {
            $editingContact = ContactProfile::find($request->edit);
        }

        return view('contact-profiles.index', compact('contactProfiles', 'editingContact'));
    }

    public function store(Request $request)
    {
        $this->validateContact($request);

        ContactProfile::create($request->all());

        return redirect()->route('contact-profiles.index')->with('success', 'Profil kontak berhasil ditambahkan');
    }

    public function edit($id)
    {
        $contactProfiles = ContactProfile::all();
        $editingContact = ContactProfile::find($id);

        if (!$editingContact) {
            return redirect()->route('contact-profiles.index')->with('error', 'Profil kontak tidak ditemukan');
        }

        return view('contact-profiles.index', compact('contactProfiles', 'editingContact'));
    }

    public function update(Request $request, $id)
    {
        $this->validateContact($request);

        $contactProfile = ContactProfile::find($id);

        if (!$contactProfile) {
            return redirect()->route('contact-profiles.index')->with('error', 'Profil kontak tidak ditemukan');
        }

        $contactProfile->update($request->all());

        return redirect()->route('contact-profiles.index')->with('success', 'Profil kontak berhasil diperbarui');
    }

    public function destroy($id)
    {
        $contactProfile = ContactProfile::find($id);

        if (!$contactProfile) {
            return redirect()->route('contact-profiles.index')->with('error', 'Profil kontak tidak ditemukan');
        }

        $contactProfile->delete();

        return redirect()->route('contact-profiles.index')->with('success', 'Profil kontak berhasil dihapus');
    }

    protected function validateContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone_number' => 'required|string',
            'address' => 'required|string',
        ]);
    }
}
