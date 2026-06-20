OMNIVOICE FULL PLATFORM - RAILSON DEV

Arquivos:
- clonador_api_44khz_full_platform.ipynb
- gerador_premium_full.html
- set_api.php
- api_url.json

O que foi preservado:
- OmniVoice
- FastAPI
- /api/gerar
- Cloudflare Tunnel estável
- set_api.php
- api_url.json
- Gemini
- histórico/status/player/download

Novos recursos:
- /api/transcrever: transcrição automática com Whisper
- /api/vozes/salvar: salva vozes clonadas no runtime do Colab
- /api/vozes: lista vozes salvas
- /api/audio-para-voz: áudio -> transcrição -> voz clonada salva
- Template com abas: Clonar Voz, Criar Voz, Áudio -> Voz, Minhas Vozes
- Clone usando áudio enviado na hora OU voz salva
- Histórico mostra modo, voz e download

Como usar:
1. Suba set_api.php e api_url.json na sua hospedagem.
2. Suba gerador_premium_full.html na sua hospedagem.
3. Abra clonador_api_44khz_full_platform.ipynb no Google Colab.
4. Edite:
   SET_API_URL = "https://SEU-SITE.com/set_api.php"
   SET_API_TOKEN = "SENHA_FORTE_AQUI"
   GEMINI_API_KEY = "SUA_CHAVE_GEMINI"  # opcional
5. No set_api.php, use o mesmo token:
   $TOKEN_CORRETO = 'SENHA_FORTE_AQUI';
6. Rode a célula no Colab com GPU T4.

Observações:
- As vozes salvas ficam no runtime atual do Colab. Se o runtime reiniciar, elas são apagadas.
- Para deixar vozes persistentes, a próxima evolução é salvar em Google Drive.
- O modo Áudio -> Voz usa Whisper para transcrever o áudio e depois OmniVoice para gerar com a voz salva.
- Isso preserva o sistema atual e adiciona recursos sem remover os antigos.
