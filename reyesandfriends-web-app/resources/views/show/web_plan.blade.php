@extends('layout.app')

@section('title', 'Reyes&Friends - Plan Web: ' . $webPlan->name)
@section('description', 'Descubre nuestro plan web "' . $webPlan->name . '" diseñado para impulsar tu negocio al siguiente nivel. Soluciones digitales innovadoras y personalizadas. ¡Transforma tu empresa hoy!')
@section('keywords', 'planes web, desarrollo web, diseño web, soluciones digitales, aplicaciones móviles, software a medida, chile, ' . $webPlan->name)

@section('content')
	<section class="py-16">
		<div class="container mx-auto px-6">
			<div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12 p-12 items-start bg-zinc-900 rounded-xl">
				<div class="flex flex-col justify-center">
					@if($webPlan->images && count($webPlan->images) > 0)
						<div class="flex flex-col gap-4">
							<div class="w-full aspect-[16/9] mb-2">
								<img
									src="{{ $webPlan->images[0]->image_url }}"
									alt="Mockup del plan {{ $webPlan->name }}"
									class="rounded shadow-xl w-full h-full object-cover pointer-events-none"
								/>
							</div>
							@if(count($webPlan->images) > 1)
								<div class="flex gap-3 overflow-x-auto pb-2">
									@foreach($webPlan->images as $image)
										<img
											src="{{ $image->image_url }}"
											alt="Imagen del plan {{ $webPlan->name }}"
											class="rounded shadow w-32 h-20 object-cover border-2 border-zinc-800 hover:border-red-600 transition-all duration-200 cursor-pointer"
											onclick="document.getElementById('mainImage').src='{{ $image->image_url }}'"
										/>
									@endforeach
								</div>
							@endif
						</div>
					@endif
				</div>
				<div class="flex flex-col justify-center">
					<h1 class="text-4xl md:text-5xl text-white mb-4 font-bold">
						Plan <span class="text-red-600">{{ $webPlan->name }}</span>
					</h1>
					<h2 class="text-2xl text-white mb-6 font-semibold">
						${{ number_format($webPlan->price_clp, 0, ',', '.') }}/mes
						@if($webPlan->number_of_months && $webPlan->final_price_clp)
							<span class="block text-base text-gray-400 mt-1">Durante {{ $webPlan->number_of_months }} meses</span>
						@endif
					</h2>
					<p class="text-lg text-gray-200 mb-6">
						{{ $webPlan->description }}
					</p>

					@if($webPlan->features())
						<div class="mb-6">
							<h3 class="text-xl text-white font-semibold mb-2">Características principales:</h3>
							<ul class="list-disc list-inside text-gray-200">
								@foreach($webPlan->features as $feature)
									<li>{{ $feature->feature }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					@if($webPlan->usages())
						<div class="mb-6">
							<h3 class="text-xl text-white font-semibold mb-2">Usos recomendados:</h3>
							<ul class="list-disc list-inside text-gray-200">
								@foreach($webPlan->usages as $usage)
									<li>{{ $usage->usage }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					@if($webPlan->demo_url)
						<a href="{{ $webPlan->demo_url }}" target="_blank" rel="noopener" class="inline-block mb-4 text-red-400 hover:text-red-600 underline font-semibold">Ver demo en vivo</a>
					@endif

                    <a href="" class="inline-block bg-red-800 hover:bg-red-900 text-white font-bold py-3 px-8 rounded text-lg transition text-center ">Me Interesa <i class="fas fa-arrow-right ml-2"></i></a>

				</div>
			</div>
		</div>
	</section>
@endsection

@push('scripts')
	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const mainImg = document.querySelector('img[alt^="Mockup del plan"]');
			const thumbs = document.querySelectorAll('img[alt^="Imagen del plan"]');
			thumbs.forEach(thumb => {
				thumb.addEventListener('click', function() {
					if(mainImg) mainImg.src = this.src;
				});
			});
		});
	</script>
@endpush