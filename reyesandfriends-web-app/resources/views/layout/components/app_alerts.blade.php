@if(session('success'))
<div class="fixed bottom-8 right-8 z-[9999] max-w-md w-full bg-zinc-800 border border-teal-500 rounded-xl shadow-lg opacity-0 transition-opacity duration-500 toast"
      role="alert" tabindex="-1" aria-labelledby="hs-toast-success-example-label">
    <div class="flex p-6">
      <div class="shrink-0">
          <i class="fa-solid fa-circle-check text-teal-500 size-5 mt-0.5"></i>
      </div>
      <div class="ms-3">
        <p id="hs-toast-success-example-label" class="text-base text-white">
          {{ session('success') }}
        </p>
      </div>
    </div>
  </div>
@endif

@if(session('error'))
    <div class="fixed bottom-8 right-8 z-[9999] max-w-md w-full bg-zinc-800 border border-red-500 rounded-xl shadow-lg opacity-0 transition-opacity duration-500 toast"
      role="alert" tabindex="-1" aria-labelledby="hs-toast-error-example-label">
    <div class="flex p-6">
      <div class="shrink-0">
          <i class="fa-solid fa-circle-xmark text-red-500 size-5 mt-0.5"></i>
      </div>
      <div class="ms-3">
        <p id="hs-toast-error-example-label" class="text-base text-white">
          {{ session('error') }}
        </p>
      </div>
    </div>
  </div>
@endif

@if(session('warning'))
    <div class="fixed bottom-8 right-8 z-[9999] max-w-md w-full bg-zinc-800 border border-yellow-500 rounded-xl shadow-lg opacity-0 transition-opacity duration-500 toast"
      role="alert" tabindex="-1" aria-labelledby="hs-toast-warning-example-label">
    <div class="flex p-6">
      <div class="shrink-0">
          <i class="fa-solid fa-circle-exclamation text-yellow-500 size-5 mt-0.5"></i>
      </div>
      <div class="ms-3">
        <p id="hs-toast-warning-example-label" class="text-base text-white">
          {{ session('warning') }}
        </p>
      </div>
    </div>
  </div>
@endif

@if(session('info'))
    <div class="fixed bottom-8 right-8 z-[9999] max-w-md w-full bg-zinc-800 border border-blue-500 rounded-xl shadow-lg opacity-0 transition-opacity duration-500 toast"
      role="alert" tabindex="-1" aria-labelledby="hs-toast-normal-example-label">
    <div class="flex p-6">
      <div class="shrink-0">
          <i class="fa-solid fa-circle-info text-blue-500 size-5 mt-0.5"></i>
      </div>
      <div class="ms-3">
        <p id="hs-toast-normal-example-label" class="text-base text-white">
          {{ session('info') }}
        </p>
      </div>
    </div>
  </div>
@endif

<script>
document.querySelectorAll('.toast').forEach(function(alert) {
  setTimeout(() => {
    alert.style.opacity = 1;
  }, 10);
  setTimeout(() => {
    alert.style.opacity = 0;
    setTimeout(() => {
      alert.remove();
    }, 500);
  }, 4000);
});
</script>