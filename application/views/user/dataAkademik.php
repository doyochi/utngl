<p class="fs-3 color-primary mb-4">
    Academic Details
</p>

<p class="font-w-600">
    Univeristy
</p>
<input class="auth-input mb-4" type="text" placeholder="Nama Universitas" name="" value="<?= strtok($this->session->userdata('univ'), " ") ?>">

<p class="font-w-600">
    NIM
</p>
<input class="auth-input mb-4" type="text" placeholder="NIM" name="" value="<?= strtok($this->session->userdata('nim'), " ") ?>">

<p class="font-w-600">
    Field of Study
</p>
<input class="auth-input mb-4" type="text" placeholder="Program Studi" name="" value="<?= strtok($this->session->userdata('prodi'), " ") ?>">


<p class="font-w-600">
    Semester
</p>
<input class="auth-input mb-4" type="number" placeholder="Semester" name="" value="<?= strtok($this->session->userdata('semester'), " ") ?>">

<a href="#" class="auth-btn">Edit</a>
