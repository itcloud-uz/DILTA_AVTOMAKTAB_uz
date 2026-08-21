# ==============================================================================
# Dockerfile for DELTA_AVTOMAKTAB_UZ
# Multi-stage production container for Node.js + SQLite Driving School LMS
# ==============================================================================

FROM node:20-alpine AS builder

WORKDIR /app

# Install dependencies
COPY package*.json ./
RUN npm ci --omit=dev

# Copy application source code
COPY . .

# Ensure database directory exists with proper permissions
RUN mkdir -p database public

# Production runtime stage
FROM node:20-alpine AS runner

WORKDIR /app

ENV NODE_ENV=production
ENV PORT=8000
ENV HOST=0.0.0.0

# Install curl for healthcheck
RUN apk add --no-cache curl

# Copy runtime files from builder
COPY --from=builder /app /app

# Create non-root user for security
RUN addgroup -g 1001 -S nodejs && \
    adduser -S nodeuser -u 1001 -G nodejs && \
    chown -R nodeuser:nodejs /app

USER nodeuser

EXPOSE 8000

HEALTHCHECK --interval=30s --timeout=5s --start-period=10s --retries=3 \
    CMD curl -f http://localhost:8000/health || exit 1

CMD ["node", "node_server.js"]
