@php
$theme = request()->cookie('theme') ?? 'light';
$themes = [
    'light', 'dark', 'cupcake', 'bumblebee', 'emerald', 'corporate',
    'synthwave', 'retro', 'cyberpunk', 'valentine', 'halloween', 'garden',
    'forest', 'aqua', 'lofi', 'pastel', 'fantasy', 'wireframe', 'black',
    'luxury', 'dracula', 'cmyk', 'autumn', 'business', 'acid', 'lemonade',
    'night', 'coffee', 'winter'
];
@endphp

<section class="w-full">
    @include('partials.settings-heading')
    <x-settings.layout heading="Appearance" subheading="Update your account's appearance settings">
        <div class="card bg-base-100 shadow mb-6">
            <div class="card-body space-y-6">
                <div>
                    <label class="label label-text text-base mb-2">Theme {{$theme}}</label>
                    <select class="select select-bordered w-full max-w-xs" id="theme-select">
                        
                        @foreach ($themes as $t)
                            <option value="{{ $t }}">{{ ucfirst($t) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </x-settings.layout>
</section>

<script>
(function() {
  var select = document.getElementById('theme-select');
  if (!select) return;
  var cookieTheme = window.__theme.cookie();
  if (cookieTheme) {
    select.value = cookieTheme;
  } else if ([...select.options].some(o=>o.value==='system')) {
    select.value = 'system';
  } else {
    select.value = document.documentElement.getAttribute('data-theme');
  }
  select.addEventListener('change', function(e) {
    window.__theme.set(e.target.value);
  });
})();
</script>

