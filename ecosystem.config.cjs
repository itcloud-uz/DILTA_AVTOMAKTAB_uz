module.exports = {
  apps: [
    {
      name: 'delta-avtomaktab',
      script: './node_server.js',
      instances: 'max',
      exec_mode: 'cluster',
      autorestart: true,
      watch: false,
      max_memory_restart: '500M',
      env: {
        NODE_ENV: 'production',
        PORT: 8000,
        HOST: '0.0.0.0'
      },
      log_date_format: 'YYYY-MM-DD HH:mm:ss Z',
      error_file: './storage/logs/pm2-error.log',
      out_file: './storage/logs/pm2-out.log',
      merge_logs: true
    }
  ]
};
