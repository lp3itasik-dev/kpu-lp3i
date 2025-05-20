<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Badan Eksekutif Mahasiswa</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('img/kpu.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ url('img/kpu.png') }}">
    <link rel="apple-touch-icon" href="{{ url('img/kpu.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        .candidate {
            width: 320px !important;
            height: auto !important;
        }

        .voting {
            width: 600px !important;
            height: auto !important;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <!-- Page Content -->
        <main>
            <div id="organizations"
                class="bg-[url('/public/img/building.jpg')] bg-gray-800 bg-blend-multiply bg-repeat-y bg-cover bg-center bg-fixed">
            </div>

            <script>
                async function getData() {
                    try {
                        const response = await fetch('/api/dashboard');
                        if (!response.ok) throw new Error('Network response was not ok');

                        const data = await response.json();
                        const organizations = data.vote_totals_by_period_candidate;
                        let container = '';

                        for (const [orgId, candidates] of Object.entries(organizations)) {
                            let candidateContainer = '';

                            candidates.forEach(candidate => {
                                candidateContainer += `
                            <div class="bg-white shadow-md rounded-lg text-center space-y-1.5 p-4 lg:mx-0 mx-5">
                                <div class="w-full h-52 bg-gray-200 bg-contain bg-center bg-no-repeat rounded-xl shadow-md"
                                    style="background-image: url('/storage/${candidate.candidate_logo}')">
                                </div>
                                <h2 class="text-base font-bold">${candidate.candidate_name}</h2>
                                <h3 class="text-xs font-medium">${candidate.candidate_description}</h3>
                            </div>`;
                            });

                            container += `
                        <section class="max-w-7xl mx-auto space-y-6 sm:px-6 lg:px-8 py-10">
                            <header class="max-w-lg mx-auto text-center space-y-1">
                                <h2 class="font-bold text-xl text-white mb-4">
                                    ${candidates[0]['organization_name']} ${candidates[0]['period_name']}
                                </h2>
                                <p class="text-md text-gray-50 lg:mx-0 mx-5">
                                    BEM dan HIMA adalah dua pilar penting dalam kehidupan kemahasiswaan. BEM sebagai penggerak aspirasi dan representasi mahasiswa secara umum, sementara HIMA sebagai wadah pengembangan akademik dan kekeluargaan di tingkat program studi. Keduanya bersinergi, bergerak bersama dalam mewujudkan lingkungan kampus yang aktif, kritis, dan berdaya saing.
                                </p>
                            </header>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">${candidateContainer}</div>

                            <div class="flex flex-col lg:flex-row justify-center items-center gap-5 px-4">
                                <div class="w-full sm:w-1/2 lg:w-1/3">
                                    <div class="relative" style="height: 300px;">
                                        <canvas id="chart-candidate-${candidates[0]['period_id']}-${candidates[0]['organization_id']}"></canvas>
                                    </div>
                                </div>
                                <div class="w-full sm:w-1/2 lg:w-1/3">
                                    <div class="relative" style="height: 300px;">
                                        <canvas id="chart-${candidates[0]['period_id']}-${candidates[0]['organization_id']}"></canvas>
                                    </div>
                                </div>
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

                            candidates.forEach(candidate => {
                                totalYangMemilih += candidate.total;
                                pemilih.push(candidate.total);
                                candidateArray.push(candidate.candidate_name);
                            });

                            const totalBelumMemilih = totalPemilih - totalYangMemilih;

                            const canvasCandidateId =
                                `chart-candidate-${candidates[0]['period_id']}-${candidates[0]['organization_id']}`;
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
                                        backgroundColor: ['#4CAF50', '#2196F3', '#FFC107', '#F44336'],
                                        borderColor: '#ffffff',
                                        borderWidth: 2
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            labels: {
                                                color: 'white',
                                                font: {
                                                    weight: 'bold',
                                                    size: 12
                                                }
                                            }
                                        },
                                        tooltip: {
                                            bodyColor: 'white',
                                            bodyFont: {
                                                weight: 'bold',
                                                size: 12
                                            }
                                        }
                                    }
                                }
                            });

                            new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: ['Total Pemilih', 'Yang Memilih', 'Belum Memilih'],
                                    datasets: [{
                                        label: `Real Count ${candidates[0]['organization_name']} ${candidates[0]['period_name']}`,
                                        data: [totalPemilih, totalYangMemilih, totalBelumMemilih],
                                        backgroundColor: ['#4CAF50', '#2196F3', '#FFC107'],
                                        borderColor: '#ffffff',
                                        borderWidth: 2
                                    }]
                                },
                                options: {
                                    responsive: true,
                                    maintainAspectRatio: false,
                                    plugins: {
                                        legend: {
                                            labels: {
                                                color: 'white',
                                                font: {
                                                    weight: 'bold',
                                                    size: 14
                                                }
                                            }
                                        },
                                        tooltip: {
                                            bodyColor: 'white',
                                            bodyFont: {
                                                weight: 'bold',
                                                size: 14
                                            }
                                        }
                                    },
                                    scales: {
                                        x: {
                                            ticks: {
                                                color: 'white',
                                                font: {
                                                    weight: 'bold',
                                                    size: 14
                                                }
                                            },
                                            grid: {
                                                color: 'white',
                                                borderColor: 'white'
                                            }
                                        },
                                        y: {
                                            ticks: {
                                                color: 'white',
                                                font: {
                                                    weight: 'bold',
                                                    size: 14
                                                }
                                            },
                                            grid: {
                                                color: 'white',
                                                borderColor: 'white'
                                            }
                                        }
                                    }
                                }
                            });
                        }

                    } catch (error) {
                        console.error('There was a problem with the fetch operation:', error);
                    }
                }

                setInterval(() => getData(), 10000);
                getData();
            </script>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>
