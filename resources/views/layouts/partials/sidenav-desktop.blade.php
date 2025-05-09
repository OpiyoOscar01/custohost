<aside id="desktop-sidebar" class="w-60 bg-white shadow-lg hidden lg:block sticky top-0 max-h-screen overflow-y-auto transition-all duration-300 ease-in-out z-40 border-r-4 border-gradient-to-b from-blue-500 to-indigo-500">
  <ul class="">
    <div class="flex items-center space-x-4 p-4 bg-white  hover:shadow-lg transition-shadow duration-300 rounded-md w-full max-w-xs mx-auto">
      <div class="relative group">
        <img src="{{ Auth::user()->profile_image ? Storage::url(Auth::user()->profile_image) : asset('images/profile.png')}}" alt="Profile Photo" class="w-12 h-12 rounded-full border-2 border-gray-200 group-hover:scale-105 transform transition duration-300">
        <span class="absolute bottom-0 right-0 block w-3 h-3 rounded-full bg-green-500 border-2 border-white animate-ping"></span>
        <span class="absolute bottom-0 right-0 block w-3 h-3 rounded-full bg-green-500 border-2 border-white"></span>
      </div>
      <div class="flex flex-col">
        <h2 class="text-lg font-semibold text-gray-800 group-hover:text-blue-600 transition-colors duration-300">{{ Auth::user()->name }}</h2>
        <p class="text-sm text-green-500 font-medium animate-pulse">Online</p>
        <p id="current-time" class="text-xs text-blue-700 mt-1 fw-bolder text-underline"></p>
      </div>
    </div>
    <hr class="text-blue-500">
    
    <!-- JavaScript for real-time clock -->
    <script>
  function updateTime() {
    const timeElement = document.getElementById('current-time');
    const now = new Date();

    const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    const months = [
      'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
      'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
    ];

    const dayName = days[now.getDay()];
    const monthName = months[now.getMonth()];
    const dayNumber = now.getDate();
    const year = now.getFullYear();

    let hours = now.getHours();
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');
    const ampm = hours >= 12 ? 'PM' : 'AM';
    
    hours = hours % 12;
    hours = hours ? hours : 12; // 0 should be 12

    const formattedTime = `${dayName}, ${monthName} ${dayNumber} ${year}- ${String(hours).padStart(2, '0')}:${minutes}:${seconds} ${ampm}.`;

    timeElement.textContent = formattedTime;
  }

  updateTime(); // Initial
  setInterval(updateTime, 1000); // Update every second
</script>
    
    
  <!-- Dashboard -->
 <!-- Dashboard -->
<li>
  <a href="{{ route('dashboard') }}"
     class="desktop--link block py-2 px-6 flex items-center {{ request()->routeIs('dashboard') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'hover:bg-indigo-50 text-gray-800' }}">
      <i class="bi bi-grid text-lg mr-3"></i> Dashboard
  </a>
</li>

@hostel_manager
@php
  $hostelRoutes = ['hostels.show', 'hostels.create', 'hostels.edit', 'hostels.rooms', 'hostels.bookings'];
  $isHostelActive = collect($hostelRoutes)->contains(fn($r) => request()->routeIs($r));
@endphp

<!-- My Hostels -->
<li>
  <button class="desktop--dropdown-toggle w-full text-left py-2 px-6 hover:bg-indigo-50 flex items-center rounded-lg" data-dropdown-target="desktop--hostels-dropdown">
      <i class="bi bi-house-door text-lg mr-3"></i> My Hostels
      <i class="bi bi-chevron-down ml-auto text-gray-600 transition-transform duration-200 {{ $isHostelActive ? 'rotate-180' : '' }}"></i>
  </button>
  <ul id="desktop--hostels-dropdown" class="desktop--dropdown pl-8 space-y-2 {{ $isHostelActive ? '' : 'hidden' }}">
      @if(Auth::user()->hostels->isEmpty())
          <li>
              <a href="{{ route('hostels.create') }}"
                 class="desktop--link block py-2 flex items-center text-gray-500 {{ request()->routeIs('hostels.create') ? 'bg-indigo-200 text-indigo-700 font-semibold' : 'hover:bg-indigo-100' }}">
                  <i class="bi bi-plus-circle text-sm mr-2"></i> Create Hostel
              </a>
          </li>
      @else
          @foreach (Auth::user()->hostels as $hostel)
              <li>
                  <a href="{{ route('hostels.show', $hostel) }}"
                     class="desktop--link block py-2 flex items-center text-gray-500 {{ request()->routeIs('hostels.show') && request()->route('hostel') == $hostel->id ? 'bg-indigo-200 text-indigo-700 font-semibold' : 'hover:bg-indigo-100' }}">
                      <img src="{{ Storage::url($hostel->photo) }}" class="w-8 h-8 rounded-full mr-3 object-cover" alt="{{ $hostel->name }}">
                      {{ $hostel->name }}
                  </a>
              </li>
          @endforeach
      @endif
  </ul>
</li>

<!-- Bookings -->
<li>
  <a href="{{ route('bookings.all') }}"
     class="desktop--link block py-2 px-6 flex items-center {{ request()->routeIs('bookings.all') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'hover:bg-indigo-50 text-gray-800' }}">
      <i class="bi bi-calendar-check text-lg mr-3"></i> Bookings
  </a>
</li>

<!-- Payments -->
<li>
  <a href="{{ route('payments.index') }}"
     class="desktop--link block py-2 px-6 flex items-center {{ request()->routeIs('payments.index') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'hover:bg-indigo-50 text-gray-800' }}">
      <i class="bi bi-cash-stack text-lg mr-3"></i> Payments
  </a>
</li>
@endhostel_manager

@student
<!-- Browse Hostels -->
<li>
  <a href="{{ route('hostels.browse') }}"
     class="desktop--link block py-2 px-6 flex items-center {{ request()->routeIs('hostels.browse') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'hover:bg-indigo-50 text-gray-800' }}">
      <i class="bi bi-house-door text-lg mr-3"></i> Browse Hostels
  </a>
</li>

<!-- My Payments -->
<li>
  <a href="{{ route('payments.index') }}"
     class="desktop--link block py-2 px-6 flex items-center {{ request()->routeIs('payments.index') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'hover:bg-indigo-50 text-gray-800' }}">
      <i class="bi bi-cash-stack text-lg mr-3"></i> My Payments
  </a>
</li>

<!-- My Bookings -->
<li>
  <a href="{{ route('bookings.all') }}"
     class="desktop--link block py-2 px-6 flex items-center {{ request()->routeIs('bookings.all') ? 'bg-indigo-100 text-indigo-700 font-semibold' : 'hover:bg-indigo-50 text-gray-800' }}">
      <i class="bi bi-calendar-check text-lg mr-3"></i> My Bookings
  </a>
</li>
@endstudent

<!-- Settings -->
@php
  $settingRoutes = ['profile.show', 'settings.notifications'];
  $isSettingsActive = collect($settingRoutes)->contains(fn($r) => request()->routeIs($r));
@endphp
<li>
  <button class="desktop--dropdown-toggle w-full text-left py-2 px-6 hover:bg-indigo-50 flex items-center rounded-lg" data-dropdown-target="desktop--settings-dropdown">
      <i class="bi bi-gear text-lg mr-3"></i> Settings
      <i class="bi bi-chevron-down ml-auto text-gray-600 transition-transform duration-200 {{ $isSettingsActive ? 'rotate-180' : '' }}"></i>
  </button>
  <ul id="desktop--settings-dropdown" class="desktop--dropdown pl-8 space-y-2 {{ $isSettingsActive ? '' : 'hidden' }}">
      <li>
          <a href="{{ route('profile.show') }}"
             class="desktop--link block py-2 flex items-center text-gray-500 {{ request()->routeIs('profile.show') ? 'bg-indigo-200 text-indigo-700 font-semibold' : 'hover:bg-indigo-100' }}">
              <i class="bi bi-person-circle text-lg mr-2"></i> Profile
          </a>
      </li>
  </ul>
</li>

</ul>

</aside>

<!-- Script -->
<script>
document.addEventListener("DOMContentLoaded", function () {
const dropdownToggles = document.querySelectorAll('.desktop--dropdown-toggle');

dropdownToggles.forEach(toggle => {
  toggle.addEventListener('click', function () {
    const targetID = this.getAttribute('data-dropdown-target');
    const targetDropdown = document.getElementById(targetID);
    const chevronIcon = this.querySelector('.bi-chevron-down');

    // Close other dropdowns
    document.querySelectorAll('.desktop--dropdown').forEach(dropdown => {
      if (dropdown.id !== targetID) {
        dropdown.classList.add('hidden');
        const otherToggle = document.querySelector(`[data-dropdown-target="${dropdown.id}"]`);
        const otherChevron = otherToggle?.querySelector('.bi-chevron-down');
        if (otherChevron) {
          otherChevron.classList.remove('rotate-180');
        }
      }
    });

    // Toggle current dropdown and rotate chevron
    targetDropdown.classList.toggle('hidden');
    chevronIcon.classList.toggle('rotate-180');
  });
});

// Highlight only one subitem per group
const subLinks = document.querySelectorAll('.desktop--dropdown-link');

subLinks.forEach(link => {
  link.addEventListener('click', function () {
    const group = this.dataset.group;
    if (!group) return;

    document.querySelectorAll(`.desktop--dropdown-link[data-group="${group}"]`).forEach(item => {
      item.classList.remove('bg-indigo-100', 'text-indigo-700', 'font-semibold');
      item.classList.add('text-gray-500');
    });

    this.classList.add('bg-indigo-100', 'text-indigo-700', 'font-semibold');
    this.classList.remove('text-gray-500');
  });
});
});
</script>
