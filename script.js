document.addEventListener('DOMContentLoaded', function() {
   
    const guestbookForm = document.querySelector('.guestbook-form');
    if (guestbookForm) {
        guestbookForm.addEventListener('submit', function(e) {
            const nama = document.getElementById('nama').value;
            if (!nama) {
                e.preventDefault();
                alert('Nama harus diisi!');
                return false;
            }
            
            const email = document.getElementById('email').value;
            if (!email || !email.includes('@')) {
                e.preventDefault();
                alert('Email harus valid!');
                return false;
            }
            
            const komentar = document.getElementById('komentar').value;
            if (!komentar) {
                e.preventDefault();
                alert('Komentar harus diisi!');
                return false;
            }
            
            alert('Terima kasih atas komentar Anda!');
            return true;
        });
    }
});

