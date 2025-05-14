<header class="bg-gradient-to-b from-blue-500 to-blue-500 text-white py-4 px-6 flex justify-between items-center sticky top-0 z-50 shadow-md border-b-2">
  <!-- Left Group: Brand -->
  <div class="flex items-center space-x-3">
    <img src="{{ asset('images/v8.png') }}" alt="Brand Logo" class="w-10 h-10 rounded-full" />
    <h1 class="text-xl font-semibold">Custoshost</h1>
  </div>

  <!-- Mobile Menu Button -->
  <button id="menu-btn" class="lg:hidden text-white focus:outline-none">
    <i class="bi bi-list text-2xl"></i>
  </button>

  <!-- Desktop Nav -->
  <nav class="hidden lg:flex items-center space-x-6">
    {{-- <div class="bg-white text-blue-500 rounded-md md:hidden lg:block p-2 shadow-lg flex items-center justify-between hover:shadow-xl transition ease-in-out duration-300 text-xs space-x-2">
      <div class="flex items-center space-x-2">
        <i class="bi bi-pencil-square text-lg"></i>
        <div>
          <h2 class="font-semibold">Feedback</h2>
          <p class="text-gray-500">Help us improve</p>
        </div>
      </div>
      <a href="#feedback" class="bg-yellow-500 text-white px-2 py-1 rounded-full hover:bg-yellow-600 transition duration-300 whitespace-no wrap">
        Give
      </a>
    </div> --}}
    
    <div class="bg-white text-blue-500 rounded-md p-2 shadow-lg flex items-center justify-between hover:shadow-xl transition ease-in-out duration-300 text-xs space-x-2 mt-2">
      <div class="flex items-center space-x-2">
        <i class="bi bi-card-checklist text-lg"></i>
        <div>
          <h2 class="font-semibold">Current Plan</h2>
          <p class="text-gray-500">Free</p>
        </div>
      </div>
      <a href="http://custospark.test:8000/pricing/custohost" class="bg-blue-500 text-white px-2 py-1 rounded-full hover:bg-blue-600 transition duration-300 whitespace-nowrap">
        Upgrade
      </a>
    </div>
    
    <div class="bg-white text-blue-500 rounded-md p-2 shadow-lg flex items-center justify-between hover:shadow-xl transition ease-in-out duration-300 text-xs space-x-2 mt-2">
      <div class="flex items-center space-x-2">
        <i class="bi bi-person-plus text-lg"></i>
        <div>
          <h2 class="font-semibold">Refer</h2>
          <p class="text-gray-500">$10/Referral</p>
        </div>
      </div>
      <a href="#refer" class="bg-green-500 text-white px-2 py-1 rounded-full hover:bg-green-600 transition duration-300 whitespace-nowrap">
        Refer
      </a>
    </div>
    

    <!-- Notifications -->
    <div class="relative">
      <button id="notifications-btn" class="relative flex items-center focus:outline-none">
        <i class="bi bi-bell-fill text-white text-xl"></i>
        <span class="absolute top-0 right-0 translate-x-1 -translate-y-1 bg-red-500 text-white text-xs font-bold rounded-full w-4 h-4 flex items-center justify-center">
          3
        </span>
      </button>
      <div id="notifications-dropdown" class="absolute right-0 mt-2 w-64 bg-white shadow-lg rounded-md hidden">
        <ul class="p-4 text-sm space-y-2">
          <li class="border-b pb-2 text-black">Your subscription expires in 3 days</li>
          <li class="border-b pb-2 text-black">Earn $10 referral bonus!</li>
          <li class="text-black">Check out our new features</li>
        </ul>
      </div>
    </div>

    <!-- App Launcher -->
    <div class="relative inline-block text-left">
      <button id="app-launcher-btn" title="Custospark Apps"
        class="flex items-center justify-center w-10 h-10 bg-white border border-gray-200 hover:bg-gray-100 hover:shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-full transition"
        aria-haspopup="true" aria-expanded="false">
        <svg class="w-6 h-6 text-gray-600" fill="currentColor" viewBox="0 0 20 20">
          <path
            d="M2 2h4v4H2V2zm6 0h4v4H8V2zm6 0h4v4h-4V2zM2 8h4v4H2V8zm6 0h4v4H8V8zm6 0h4v4h-4V8zM2 14h4v4H2v-4zm6 0h4v4H8V14zm6 0h4v4h-4V14z" />
        </svg>
      </button>
    
      <!-- Dropdown -->
      <div id="app-launcher-dropdown"
        class="origin-top-right absolute right-0 mt-3 w-80 rounded-xl shadow-xl bg-white ring-1 ring-black ring-opacity-5 hidden z-50">
        
        <!-- Search -->
        <div class="p-4 border-b border-gray-200">
          <input type="text" id="app-search"
            class="w-full px-4 py-2 rounded-lg text-gray-700 bg-gray-50 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"
            placeholder="Search apps..." />
        </div>
    
        <!-- Header Text -->
         <div class="p-4 text-center">
          <p class="text-blue-600 font-semibold">All your apps in one place</p>
          <p class="text-gray-500 text-xs mt-1">Click on an app to start using it.</p>
        </div>
    
        <!-- App Grid -->
        <div class="px-4 pb-4 max-h-60 overflow-y-auto grid grid-cols-2 gap-4">
          
          <!-- App Card Component Example -->
          <a href="https://custosell.custospark.com" target="_blank" rel="noopener"
            class="group app-card bg-gray-50 hover:bg-blue-50 border border-gray-200 rounded-lg p-3 flex flex-col items-center text-center transition duration-200">
            <img src="{{ asset('images/v6.png') }}" alt="Custosell"
              class="w-12 h-12 mb-2 rounded-md shadow-sm group-hover:scale-105 transition" />
            <h2 class="text-sm font-semibold text-blue-600">Custosell</h2>
            <p class="text-xs text-gray-500 mt-1">Smart business management</p>
            <span
              class="mt-2 bg-green-100 text-green-700 text-xs font-medium px-2 py-0.5 rounded-full">Subscribed</span>
          </a>
    
          <a href="https://custohost.custospark.com" target="_blank" rel="noopener"
            class="group app-card bg-gray-50 hover:bg-blue-50 border border-gray-200 rounded-lg p-3 flex flex-col items-center text-center transition duration-200">
            <img src="{{ asset('images/v7.png') }}" alt="Custohost"
              class="w-12 h-12 mb-2 rounded-md shadow-sm group-hover:scale-105 transition" />
            <h2 class="text-sm font-semibold text-blue-600">Custohost</h2>
            <p class="text-xs text-gray-500 mt-1">Reliable cloud hosting</p>
            <span
              class="mt-2 bg-red-100 text-red-700 text-xs font-medium px-2 py-0.5 rounded-full">Not Subscribed</span>
          </a>
    
          <a href="http://custospark.test:8000/dashboard" target="_blank" rel="noopener"
            class="group app-card bg-gray-50 hover:bg-blue-50 border border-gray-200 rounded-lg p-3 flex flex-col items-center text-center transition duration-200">
            <img src="{{ asset('images/custospark.png') }}" alt="Custospark"
              class="w-12 h-12 mb-2 rounded-md shadow-sm group-hover:scale-105 transition" />
            <h2 class="text-sm font-semibold text-blue-600">Custospark</h2>
            <p class="text-xs text-gray-500 mt-1">Tech innovation hub</p>
            <span
              class="mt-2 bg-green-100 text-green-700 text-xs font-medium px-2 py-0.5 rounded-full">Subscribed</span>
          </a>
        </div>
    
        <!-- Help -->
        <div class="p-4 border-t border-gray-200 bg-gray-50 rounded-b-xl">
          <button id="help-btn"
            class="w-full text-left text-sm text-gray-600 hover:text-blue-600 transition">
            Need help? <span class="font-semibold">Contact support</span>
          </button>
        </div>
      </div>
    </div>
    

    <!-- Profile -->
    <div class="relative">
      <!-- Profile Button -->
      <button id="profile-btn" class="flex items-center space-x-2 text-white hover:text-indigo-400 transition">
        <img src="{{ Auth::user()->profile_image ? Storage::url(Auth::user()->profile_image) : asset('images/profile.png') }}" 
        alt="Profile Photo" 
        class="w-10 h-10 rounded-full" />
                  <i class="bi bi-chevron-down"></i>
      </button>      
    
        <!-- Profile Dropdown -->
        <div id="profile-dropdown"
            class="absolute right-0 hidden bg-white shadow-lg rounded-md mt-2 w-48 border border-gray-200">
            <ul class="text-gray-700 text-sm">
                <li>
                    <a href="#profile" class="block px-4 py-2 hover:bg-indigo-100 flex items-center rounded-md">
                        <i class="bi bi-person-circle mr-2"></i> Profile
                    </a>
                </li>
                <li>
                    <a href="#settings" class="block px-4 py-2 hover:bg-indigo-100 flex items-center rounded-md">
                        <i class="bi bi-gear mr-2"></i> Settings
                    </a>
                </li>
                <li>
                    <a href="#subscriptions" class="block px-4 py-2 hover:bg-indigo-100 flex items-center rounded-md">
                        <i class="bi bi-card-list mr-2"></i> My Subscriptions
                    </a>
                </li>
                <li>
                    <a href="http://custospark.test:8000/pricing/custohost" target="_blank" class="block px-4 py-2 hover:bg-indigo-100 flex items-center rounded-md">
                        <i class="bi bi-tags mr-2"></i> Pricing
                    </a>
                </li>
                <li>
                    <a href="#help-support" class="block px-4 py-2 hover:bg-indigo-100 flex items-center rounded-md">
                        <i class="bi bi-life-preserver mr-2"></i> Help & Support
                    </a>
                </li>
                <li>
                    <a href="#payments" class="block px-4 py-2 hover:bg-indigo-100 flex items-center rounded-md">
                        <i class="bi bi-wallet2 mr-2"></i> Payments
                    </a>
                </li>
                        <li>
          <form action="{{ env('APP_ENV') === 'local' ? 'http://custospark.test:8000/sso/logout' : 'https://custospark.com/sso/logout' }}" method="GET" class="w-full inline">
              <!-- Pass the 'app' URL parameter dynamically -->
              <input type="hidden" name="app" value="{{ request()->query('app', 'custohost') }}">
              <button type="submit" class="block w-full px-4 py-2 hover:bg-red-100 flex items-center rounded-md text-red-600 bg-transparent border-0">
                  <i class="bi bi-box-arrow-right mr-2"></i> Logout
              </button>
          </form>
      </li>
            </ul>
        </div>
    </div>
  </nav>
</header>


<!-- JavaScript for Dropdown Interactions -->
<script>
  // Toggle helper function
  function toggleDropdown(btnId, dropdownId) {
    document.getElementById(btnId).addEventListener('click', function(e) {
      e.stopPropagation();
      document.getElementById(dropdownId).classList.toggle('hidden');
    });
  }

  // Initialize toggles for notifications, app launcher, and profile
  toggleDropdown('notifications-btn', 'notifications-dropdown');
  toggleDropdown('app-launcher-btn', 'app-launcher-dropdown');
  toggleDropdown('profile-btn', 'profile-dropdown');

  // Close dropdowns when clicking outside (except while interacting with search)
  document.addEventListener('click', function(e) {
    if (!e.target.closest('#notifications-btn') && !e.target.closest('#notifications-dropdown')) {
      document.getElementById('notifications-dropdown').classList.add('hidden');
    }
    if (!e.target.closest('#app-launcher-btn') && !e.target.closest('#app-launcher-dropdown')) {
      document.getElementById('app-launcher-dropdown').classList.add('hidden');
    }
    if (!e.target.closest('#profile-btn') && !e.target.closest('#profile-dropdown')) {
      document.getElementById('profile-dropdown').classList.add('hidden');
    }
  });

  // Search filter (keep dropdown open)
  document.getElementById('app-search').addEventListener('input', function() {
    const query = this.value.toLowerCase();
    document.querySelectorAll('#app-launcher-dropdown .app-card').forEach(card => {
      const name = card.querySelector('h2').innerText.toLowerCase();
      card.style.display = name.includes(query) ? 'flex' : 'none';
    });
  });

  // Close app launcher dropdown when an app card is clicked
  document.querySelectorAll('#app-launcher-dropdown .app-card').forEach(card => {
    card.addEventListener('click', () => {
      document.getElementById('app-launcher-dropdown').classList.add('hidden');
    });
  });

  // Help button action (adjust URL as needed)
  document.getElementById('help-btn').addEventListener('click', () => {
    window.location.href = '#'; // Modify destination as required
  });
</script>
