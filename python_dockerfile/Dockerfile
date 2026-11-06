FROM python:3.12-slim
ENV PYTHONUNBUFFERED=1
WORKDIR /app
COPY suma.py .
# CMD ["sleep 1 && python", "suma.py"]
CMD ["sh", "-c", "sleep 1 && python suma.py"]