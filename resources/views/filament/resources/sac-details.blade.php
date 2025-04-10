<div class="p-6">
    <h2 class="text-xl font-bold text-[#90295a] mb-4">Detalhes da Solicitação do SAC</h2>
    <div class="space-y-4">
        <div class="bg-[#f3ca85] p-4 rounded-lg">
            <p class="text-[#888a8d]"><strong>Nome:</strong> {{ $record->name }}</p>
        </div>
        <div class="bg-[#f3ca85] p-4 rounded-lg">
            <p class="text-[#888a8d]"><strong>E-mail:</strong> {{ $record->email }}</p>
        </div>
        <div class="bg-[#f3ca85] p-4 rounded-lg">
            <p class="text-[#888a8d]"><strong>Produto Reportado:</strong> {{ $record->reported_product }}</p>
        </div>
        <div class="bg-[#f37931] p-4 rounded-lg text-white">
            <p><strong>Problema Reportado:</strong></p>
            <p>{{ $record->reported_problem }}</p>
        </div>
        <div class="bg-[#f3ca85] p-4 rounded-lg">
            <p class="text-[#888a8d]"><strong>Data de Envio:</strong> {{ $record->created_at->format('d/m/Y H:i') }}</p>
        </div>
        <div class="bg-[#f3ca85] p-4 rounded-lg">
            <p class="text-[#888a8d]"><strong>Status:</strong> {{ $record->is_viewed ? 'Visto' : 'Não Visto' }}</p>
        </div>
    </div>
</div>
