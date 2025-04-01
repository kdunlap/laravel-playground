
#### Test Docker Build Locally

```
docker build --platform=linux/amd64 -t laravel-queue-worker .
docker run -d laravel-queue-worker
```

#### Create ACR Instance

`az acr create --resource-group rg-tc-queue-worker-001 --name crtcqueueworkerprod001 --sku Basic`

#### Log in to ACR

`az acr login --name crtcqueueworkerprod001`

#### Tag and Push Docker Image

```
docker tag laravel-queue-worker crtcqueueworkerprod001.azurecr.io/laravel-queue-worker:v1.01
docker push crtcqueueworkerprod001.azurecr.io/laravel-queue-worker:v1.01
```

#### Create an ACI Instance

```
az container create \
  --resource-group rg-tc-queue-worker-001 \
  --name laravel-queue-worker \
  --image crtcqueueworkerprod001.azurecr.io/laravel-queue-worker:v1.01 \
  --cpu 1 \
  --memory 1 \
  --os-type Linux
  --registry-login-server crtcqueueworkerprod001.azurecr.io \
  --registry-username <username> \
  --registry-password <password> \
  --restart-policy OnFailure
```

#### Check Queue Worker is running

`az container logs --name laravel-queue-worker --resource-group rg-tc-queue-worker-001`

#### Add Environment Variables to GitHub Actions

```
AZURE_ACR_LOGIN_SERVER=crtcqueueworkerprod001.azurecr.io
AZURE_ACR_USERNAME=<Admin username from az acr credential show>
AZURE_ACR_PASSWORD=<Admin password from az acr credential show>
AZURE_RESOURCE_GROUP=rg-tc-queue-worker-001
AZURE_CONTAINER_NAME=laravel-queue-worker
AZURE_LOCATION=canadacentral
AZURE_TENANT_ID
```

#### Add Environment Variables to Azure for Queue Worker
```
REDIS_CLIENT=phpredis
REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

#### Other changes

- Add `Microsoft.ContainerInstance` to registered Resource Providers in Subscription