<p class="fs-3 color-primary mb-4">
    Personal Information
</p>

<p class="font-w-600">
    Email
</p>
<input class="auth-input mb-4" type="text" placeholder="Email" name="" value="<?= strtok($this->session->userdata('email'), " ") ?>">

<p class="font-w-600">
    Phone Number
</p>
<input class="auth-input mb-4" type="text" placeholder="No Telepon" name="" value="<?= strtok($this->session->userdata('telp'), " ") ?>">

<p class="font-w-600">
    Name
</p>
<input class="auth-input mb-4" type="text" placeholder="Nama" name="" value="<?= strtok($this->session->userdata('nama'), " ") ?>">

<p class="font-w-600">
    Gender
</p>
<input class="auth-input mb-4" type="text" placeholder="Gender" name="" value="<?= ($this->session->userdata('jk') == "1" ? "Male":"Female")?>">

<p class="font-w-600">
    Place of Birth
</p>
<input class="auth-input mb-4" type="text" placeholder="Tempat Kelahiran" name="" value="<?= strtok($this->session->userdata('tempatlahir'), " ") ?>">

<p class="font-w-600">
    Date of Birth
</p>
<input class="auth-input mb-4" type="text" placeholder="Tanggal Lahir" name="" value="<?= strtok($this->session->userdata('tgllahir'), " ") ?>-<?= strtok($this->session->userdata('blnlahir'), " ") ?>-<?= strtok($this->session->userdata('thnlahir'), " ") ?>">

<p class="font-w-600">
    NIK
</p>
<input class="auth-input mb-4" type="text" placeholder="NIK" name="" value="<?= strtok($this->session->userdata('nik'), " ") ?>">

<a href="#" class="auth-btn">Edit</a>