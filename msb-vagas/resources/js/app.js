import './bootstrap';
console.log('ta carregando')
import Chart from 'chart.js/auto';
window.Chart = Chart;

// Configuração do Chart.js para tema do dashboard
Chart.defaults.color = '#64748b';
Chart.defaults.borderColor = '#e2e8f0';
Chart.defaults.backgroundColor = 'rgba(59, 130, 246, 0.1)';