<!-- Appointment Start -->
<div class="container-fluid bg-primary my-5 py-5">
    <div class="container py-5">
        <div class="row gx-5">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="mb-4">
                    <h5 class="d-inline-block text-white text-uppercase border-bottom border-5">Appointment</h5>
                    <h1 class="display-4">Make An Appointment For Your Family</h1>
                </div>
                <p class="text-white mb-5">Eirmod sed tempor lorem ut dolores. Aliquyam sit sadipscing kasd ipsum.
                    Dolor ea et dolore et at sea ea at dolor, justo ipsum duo rebum sea invidunt voluptua. Eos vero
                    eos vero ea et dolore eirmod et. Dolores diam duo invidunt lorem. Elitr ut dolores magna sit.
                    Sea dolore sanctus sed et. Takimata takimata sanctus sed.</p>
                <a class="btn btn-dark rounded-pill py-3 px-5 me-3" href="#!">Find Doctor</a>
                <a class="btn btn-outline-dark rounded-pill py-3 px-5" href="#!">Read More</a>
            </div>
            <div class="col-lg-6">
                <div class="bg-white text-center rounded p-5">
                    <h1 class="mb-4">Book An Appointment</h1>
                    <form action="" method="" id="appointmentForm">
                            @if (session()->has('success'))
                                <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                                    <span class="font-medium">Appointment Send Successfully</span> {{ session('success') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                                    <span class="font-medium">Something is Wrong</span>
                                    <ul class="mt-1.5 list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        <div class="row g-3">
                            {{-- Department --}}
                            <div class="col-12 col-sm-6">
                                <select class="form-select bg-light border-0" style="height: 55px;" id="departmentSelect" name="department_id">
                                    <option value="" selected disabled>Choose Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->department_title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            {{-- Doctor --}}
                            <div class="col-12 col-sm-6">
                                <select class="form-select bg-light border-0" style="height: 55px;" id="doctorSelect" name="doctor_id">
                                    <option value="" selected disabled>Select Doctor</option>
                                    @foreach ($departments as $department)
                                        @foreach ($department->doctors as $doctor)
                                            <option value="{{ $doctor->id }}" data-dept="{{ $department->id }}" style="display: none;">
                                                {{ $doctor->doctor_name }}
                                            </option>
                                        @endforeach
                                        @endforeach
                                    </select>
                                </div>
                                {{-- Name --}}
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" placeholder="Your Name"
                                    style="height: 55px;"
                                    name="App_name"
                                    >
                            </div>
                            {{-- Email --}}
                            <div class="col-12 col-sm-6">
                                <input type="email" class="form-control bg-light border-0" placeholder="Your Email"
                                style="height: 55px;"
                                    name="App_email"
                                    >
                                </div>
                                {{-- Date --}}
                                <div class="col-12 col-sm-6">
                                    <div class="date" id="date" data-target-input="nearest">
                                        <input type="date" class="form-control bg-light border-0 datetimepicker-input"
                                        placeholder="Date" data-target="#date" data-toggle="datetimepicker"
                                        style="height: 55px;"
                                        name="date"
                                        >
                                    </div>
                                </div>
                                {{-- Time --}}
                            <div class="col-12 col-sm-6">
                                <div class="time" id="time" data-target-input="nearest">
                                    <input type="text" class="form-control bg-light border-0 datetimepicker-input"
                                        placeholder="Time" data-target="#time" data-toggle="datetimepicker"
                                        style="height: 55px;"
                                        name="time"
                                        >
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Make An
                                    Appointment</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('departmentSelect').addEventListener('change', function() {
    const departmentId = this.value;
    const doctorSelect = document.getElementById('doctorSelect');
    const doctors = doctorSelect.querySelectorAll('option');

    doctorSelect.value = "";

    doctors.forEach(option => {
        if (option.value === "") {
            option.style.display = "block";
        } 
        else if (option.getAttribute('data-dept') === departmentId) {
            option.style.display = "block";
        } else {
            option.style.display = "none";
        }
    });
});


document.getElementById('appointmentForm').addEventListener('submit' , function(e){
    e.preventDefault();
    const formData = new FormData(this);
    const btn = this.querySelector('button[type="submit"]')

    btn.disabled = true;
    btn.innerText = 'Sending...'
    
    fetch("{{ route('appointment.store') }}",{
        method : "POST",
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}",
            'Accept':'application/json'
        },
        body: formData
    })
    .then(async (response) =>{
        const data = await response.json();
        if(response.ok){
            alert('Success' , data.message)
        }else if(response.status == 422){
            const errorMessage = Object.values(data.errors).flat().join('\n');
            alert('Validation Failed\n' + errorMessage);
        }else{
            alert(data.message)
        }
    }).catch(e=>{
        console.log('Error' , e);
        alert('Connection Error')
    }).finally(()=>{
        btn.disabled = false;
        btn.innerText = 'Make An Appointment';
    })
    ;
})

</script>
@endpush
<!-- Appointment End -->