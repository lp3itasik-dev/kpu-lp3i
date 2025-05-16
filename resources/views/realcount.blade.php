<x-realcount-layout>
    <div id="organizations"></div>
    <script>
        async function getData() {
            try {
                const response = await fetch('/api/dashboard');
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }

                const data = await response.json();
                const organizations = data.vote_totals_by_period_candidate;
                let container = '';

                for (const [orgId, candidates] of Object.entries(organizations)) {
                    let candidateContainer = '';

                    candidates.forEach((candidate) => {
                        candidateContainer += `
                        <div class="bg-white shadow-md rounded-lg text-center space-y-1.5 p-4">
                            <div class="w-full h-52 bg-gray-200 bg-contain bg-center bg-no-repeat rounded-xl shadow-md"
     style="background-image: url('/storage/${candidate.candidate_logo}')">
</div>

                            <h2 class="text-base font-bold">${candidate.candidate_name}</h2>
                            <h3 class="text-xs font-medium">${candidate.candidate_description}</h3>
                        </div>`;
                        console.log(candidates);
                    });

                    container += `
                    <section class="max-w-7xl mx-auto space-y-4 sm:px-6 lg:px-8 h-screen flex flex-col justify-center gap-5">
                        <header class="max-w-lg mx-auto text-center space-y-1">
                            <h2 class="font-bold text-md">${candidates[0]['organization_name']} ${candidates[0]['period_name']}</h2>
                            <p class="text-sm text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                        </header>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">${candidateContainer}</div>
                        <div class="flex justify-center items-center gap-10">
                            <canvas class="candidate" id="chart-candidate-${candidates[0]['period_id']}-${candidates[0]['organization_id']}"></canvas>
                            <canvas class="voting" id="chart-${candidates[0]['period_id']}-${candidates[0]['organization_id']}"></canvas>
                        </div>
                    </section>`;
                }

                document.getElementById('organizations').innerHTML = container;

                for (const [orgId, candidates] of Object.entries(organizations)) {
                    let totalYangMemilih = 0;
                    let totalPemilih = 0;
                    let pemilih = [];
                    let candidateArray = [];
                    let urlCardVote = `/api/cardvote/${candidates[0]['period_id']}`;
                    if (candidates[0]['program_id'] !== null) {
                        urlCardVote += `/${candidates[0]['organization_id']}`;
                    }

                    try {
                        const res = await fetch(urlCardVote);
                        if (!res.ok) throw new Error('Failed to fetch cardvote');
                        const result = await res.json();
                        totalPemilih = result.totalPemilih ?? 0;
                    } catch (error) {
                        console.error('Error fetching cardvote:', error);
                    }

                    candidates.forEach((candidate) => {
                        totalYangMemilih += candidate.total;
                        pemilih.push(candidate.total);
                        candidateArray.push(candidate.candidate_name);
                    });

                    console.log(candidateArray);

                    const totalBelumMemilih = totalPemilih - totalYangMemilih;
                    const persentase = totalPemilih > 0 ? ((totalYangMemilih / totalPemilih) * 100).toFixed() : '0.00';

                    const canvasCandidateId = `chart-candidate-${candidates[0]['period_id']}-${candidates[0]['organization_id']}`;
                    const canvasId = `chart-${candidates[0]['period_id']}-${candidates[0]['organization_id']}`;

                    const ctxCandidate = document.getElementById(canvasCandidateId);
                    const ctx = document.getElementById(canvasId);

                    new Chart(ctxCandidate, {
                        type: 'pie',
                        data: {
                            labels: candidateArray,
                            datasets: [{
                                label: `Jumlah Pemilih`,
                                data: pemilih,
                                borderWidth: 1
                            }]
                        },
                    });

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: ['Total Pemilih', 'Yang Memilih', 'Belum Memilih'],
                            datasets: [{
                                label: `Real Count ${candidates[0]['organization_name']} ${candidates[0]['period_name']}`,
                                data: [totalPemilih, totalYangMemilih, totalBelumMemilih,],
                                borderWidth: 1
                            }]
                        },
                    });
                }

            } catch (error) {
                console.error('There was a problem with the fetch operation:', error);
            }
        }

        setInterval(() => {
            getData();
        }, 10000);

        getData();
    </script>
</x-realcount-layout>
