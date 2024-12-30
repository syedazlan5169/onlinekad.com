<x-app-layout>
    <x-slot name="header">
        <h2 class="mb-5 font-semibold text-gray-800 leading-tight">
            {{ __('Dasar Privasi') }}
        </h2>
        <div>
            {{ Breadcrumbs::render('dasar-privasi') }}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-10 bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <main class="container my-5">
                    <section>
                        <p>Terakhir dikemas kini: <strong>{{ now()->format('d M Y') }}</strong></p>
            
                        <p>Kami di <strong>onlinekad.com</strong> komited untuk melindungi privasi dan keselamatan maklumat peribadi anda. Dasar Privasi ini menerangkan bagaimana kami mengumpul, menggunakan, dan melindungi maklumat anda apabila anda menggunakan laman web kami.</p>
                    </section>
            
                    <section class="mt-4">
                        <h2 class="font-bold underline">1. Maklumat yang Kami Kumpulkan</h2>
                        <ul>
                            <li>Maklumat Peribadi: Nama, alamat e-mel, nombor telefon, alamat penghantaran/bil.</li>
                            <li>Maklumat Transaksi: Butiran tempahan atau pembelian anda.</li>
                            <li>Maklumat Teknologi: Alamat IP, jenis pelayar web, dan maklumat mengenai interaksi anda dengan laman web kami.</li>
                        </ul>
                    </section>
            
                    <section class="mt-4">
                        <h2 class="font-bold underline">2. Bagaimana Kami Menggunakan Maklumat Anda</h2>
                        <ul>
                            <li>Memproses tempahan atau pembelian anda.</li>
                            <li>Memberikan sokongan pelanggan.</li>
                            <li>Meningkatkan pengalaman pengguna di laman web kami.</li>
                            <li>Memberitahu anda mengenai kemas kini atau promosi.</li>
                        </ul>
                    </section>
            
                    <section class="mt-4">
                        <h2 class="font-bold underline">3. Pendedahan Maklumat kepada Pihak Ketiga</h2>
                        <p>Kami tidak akan berkongsi maklumat peribadi anda kepada pihak ketiga tanpa kebenaran anda, kecuali untuk:</p>
                        <ul>
                            <li>Memenuhi keperluan undang-undang.</li>
                            <li>Pemprosesan pembayaran melalui penyedia perkhidmatan pihak ketiga.</li>
                            <li>Perkhidmatan penghantaran atau logistik.</li>
                        </ul>
                    </section>
            
                    <section class="mt-4">
                        <h2 class="font-bold underline">4. Perlindungan Maklumat Anda</h2>
                        <p>Kami menggunakan langkah keselamatan teknikal dan organisasi untuk melindungi maklumat peribadi anda daripada akses, pendedahan, atau penggunaan yang tidak dibenarkan.</p>
                    </section>
            
                    <section class="mt-4">
                        <h2 class="font-bold underline">5. Kuki dan Teknologi Penjejakan</h2>
                        <p>Kami menggunakan kuki untuk:</p>
                        <ul>
                            <li>Menyimpan pilihan pengguna.</li>
                            <li>Memahami bagaimana anda menggunakan laman web kami.</li>
                        </ul>
                        <p>Anda boleh memilih untuk melumpuhkan kuki melalui tetapan pelayar web anda.</p>
                    </section>
            
                    <section class="mt-4">
                        <h2 class="font-bold underline">6. Hak Anda</h2>
                        <p>Anda mempunyai hak untuk:</p>
                        <ul>
                            <li>Meminta akses kepada maklumat peribadi anda.</li>
                            <li>Membetulkan atau mengemas kini maklumat anda.</li>
                            <li>Memadamkan akaun anda atau menarik balik kebenaran.</li>
                        </ul>
                    </section>
            
                    <section class="mt-4">
                        <h2 class="font-bold underline">7. Hubungi Kami</h2>
                        <p>Jika anda mempunyai sebarang soalan atau kebimbangan mengenai Dasar Privasi ini, sila hubungi kami:</p>
                        <ul>
                            <li><strong>E-mel:</strong> info@onlinekad.com</li>
                            <li><strong>Telefon:</strong> 010-8323516</li>
                        </ul>
                    </section>
            
                    <section class="mt-4">
                        <h2 class="font-bold underline">8. Perubahan pada Dasar Privasi</h2>
                        <p>Kami berhak untuk mengemas kini Dasar Privasi ini dari semasa ke semasa. Sebarang perubahan akan diterbitkan di laman web ini dengan tarikh kemas kini.</p>
                    </section>
                </main>

            </div>
        </div>
    </div>
</x-app-layout>
