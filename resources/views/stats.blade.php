@extends('layouts.user_type.auth')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




<div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
              <div class="d-flex flex-column h-50">
                <h5 class="font-weight-bolder">Statistiques des Étapes avec impact écologique</h5>
                <div style="position: relative; width: 50%; height: 400px;"> <!-- Ajustez la largeur et la hauteur ici -->

                    <canvas id="impactChart"></canvas></div>
                    <script>
                    const ctx = document.getElementById('impactChart').getContext('2d');
                    const impactChart = new Chart(ctx, {
                        type: 'pie', // Type de graphique
                        data: {
                            labels: ['Avec Impact', 'Sans Impact'],
                            datasets: [{
                                label: 'Statistiques des Étapes',
                                data: [{{ $impactCount }}, {{ $noImpactCount }}],
                                backgroundColor: [
                                    'rgba(75, 192, 192, 0.6)', // Couleur pour avec impact
                                    'rgba(255, 99, 132, 0.6)'  // Couleur pour sans impact
                                ],
                                borderColor: [
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(255, 99, 132, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(tooltipItem) {
                                            return tooltipItem.label + ': ' + tooltipItem.raw + ' (' + (tooltipItem.raw / {{ $impactCount + $noImpactCount }} * 100).toFixed(2) + '%)';
                                        }
                                    }
                                }
                            }
                        }
                    });
                </script>

              </div>
          </div>
        </div>
      </div>
    </div>



    @endsection



