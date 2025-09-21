<?php
// Impede o php de converter tipos sozinho
declare(strict_types=1);

// Peso do arquivo
function human_filesize($bytes): string
{
  $size = ['B', 'KB', 'MB', 'GB', 'TB'];

  if ($bytes == 0)
    return '0 B';

  // Transforma em string
  $bytesStr = (string) $bytes;

  // Conta digitos
  $numDigits = strlen($bytesStr);

  // -1 porque comeca a contar do 0
  $adjusted = $numDigits - 1;

  // Separa em blocos de 3 digitos
  $divided = $adjusted / 3;

  // Arredonda para baixo
  $floored = floor($divided);

  // Factor fica com o index do peso
  $factor = (int) $floored;

  return sprintf("%.2f", $bytes / pow(1024, $factor)) . ' ' . $size[$factor];
}

// __DIR__ e a contante magica que retorna o diretorio do arquivo
// Realpath para caminho absoluto sem simbolos
$baseDir = realpath(__DIR__);

if (isset($_GET['dir'])) {
  // Pega o valor passado pela URL
  $request = $_GET['dir'];
  // Remove barras
  $request = trim($request, "/\\");
} else {
  $request = '';
}

// Impede que acesse outra pastas
$request = str_replace(['..'], '', $request);

// Junta a base do diretorio com o caminho usando o seprador default do SO
// DIRECTORY_SEPARATOR e uma constante pre-definida do php
$candidate = realpath($baseDir . DIRECTORY_SEPARATOR . $request);

// Se a pasta nao existir ou for de fora do projeto, cai na raiz
if ($candidate === false || strpos($candidate, $baseDir) !== 0) {
  $target = $baseDir;
  $relPath = '';
} else {
  // Recebe a pasta
  $target = $candidate;

  // Remove a raiz
  $relative = str_replace($baseDir, '', $target);

  // Remove separadores
  $relPath = ltrim($relative, DIRECTORY_SEPARATOR);
}

// Impede o Index de se listar
$self = basename(__FILE__);

// Retorna todos os arquivos e pastas
$scanned = @scandir($target);
// Caso falhe
$scanned = $scanned ?: [];

// Remove itens que nao devem ser mostrados
$filtered = array_diff($scanned, ['.', '..', $self]);

// Reindexa o array
$items = array_values($filtered);

// Ordenando pastas primeiro, depois arquivos
usort($items, function ($a, $b) use ($target) {
  $aIsDir = is_dir($target . DIRECTORY_SEPARATOR . $a);
  $bIsDir = is_dir($target . DIRECTORY_SEPARATOR . $b);

  if ($aIsDir && !$bIsDir)
    return -1;

  if (!$aIsDir && $bIsDir)
    return 1;

  return strcasecmp($a, $b);
});

// Icones do bootstrap
function file_icon_class($name)
{
  // Extrai extensao do arquivo
  $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

  $map = [
    'php' => 'bi-file-earmark-code-fill',
    'html' => 'bi-code-slash',
    'htm' => 'bi-code-slash',
    'css' => 'bi-file-earmark-code-fill',
    'js' => 'bi-file-earmark-code-fill',
    'jpg' => 'bi-file-image',
    'jpeg' => 'bi-file-image',
    'png' => 'bi-file-image',
  ];

  // Caso nao ache retorna icone generico
  return $map[$ext] ?? 'bi-file-earmark';
}

// Prepara o path
function encode_path_segments(string $path): string
{
  if ($path === '')
    return '';

  // Divide a string usando os separadores
  $parts = preg_split('#[\\/\\\\]+#', $path);

  // Remove partes vazias do array
  $filteredParts = array_filter($parts, function ($p) {
    return $p !== '';
  });

  // Transforma caracteres especiais em codigos percentuais
  $encodedParts = array_map('rawurlencode', $filteredParts);

  // Junta as partes usando /
  // Idependende do SO o navegador usar /
  $finalPath = implode('/', $encodedParts);

  return $finalPath;
}

// Monta url para pasta
function url_for_dir(string $relPath, string $item): string
{
  // Array com o caminho relativo e a subpasta
  $parts = [$relPath, $item];

  // Remove elementos vazios
  $segments = array_filter($parts, function ($x) {
    return $x !== '';
  });

  // Junta pasta e subpasta
  $joined = implode('/', $segments);

  // SCRIPT_NAME = Index.php
  return $_SERVER['SCRIPT_NAME'] . '?dir=' . encode_path_segments($joined);
}

// Monta url para arquivo
function url_for_file(string $relPath, string $item): string
{
  if ($relPath === '') {
    $prefix = '';
  } else {
    // Arquivo esta dentro de uma subpasta
    // Codifica o caminho da pasta
    $encodedPath = encode_path_segments($relPath);
    $prefix = $encodedPath . '/';
  }

  // Codifica o nome do arquivo para URL
  $encodedFile = rawurlencode($item);

  // Junta o caminho da pasta com o arquivo
  $url = $prefix . $encodedFile;

  return $url;
}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <title><?php echo htmlspecialchars(basename($target)); ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body {
      padding: 22px;
      background: #f7f9fc;
    }

    .card {
      transition: transform .08s ease;
    }

    .card:hover {
      transform: translateY(-4px);
    }

    .file-name {
      word-break: break-all;
    }

    .small-muted {
      font-size: .82rem;
      color: #6c757d;
    }

    .search {
      max-width: 520px;
    }

    .top-controls {
      gap: .5rem;
      display: flex;
      align-items: center;
    }
  </style>
</head>

<body>
  <div class="container">
    <header class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h3 class="mb-0"><i class="bi bi-folder2-open"></i> <?php echo htmlspecialchars(basename($target)); ?>
        </h3>
        <small class="small-muted">Path: <?php echo htmlspecialchars($target); ?></small>

        <?php if ($relPath !== ''):
          // Botao da pasta pai
          $parentParts = explode('/', $relPath);
          array_pop($parentParts);
          $parent = implode('/', $parentParts);

          $parentUrl = $_SERVER['SCRIPT_NAME'] . ($parent ? '?dir=' . encode_path_segments($parent) : '');
        ?>

          <div class="mt-2 top-controls">
            <button class="btn btn-sm btn-outline-secondary"
              onclick="goBack(event, '<?php echo htmlspecialchars($parentUrl, ENT_QUOTES); ?>')"
              aria-label="Go back to parent folder" title="Back">
              <i class="bi bi-arrow-left"></i> Back
            </button>

            <a class="ms-2 small text-decoration-none" href="<?php echo htmlspecialchars($parentUrl); ?>">
              <i class="bi bi-folder2-open"></i> Parent
            </a>
          </div>
        <?php endif; ?>

      </div>
      <div>
        <input id="search" class="form-control search" placeholder="Search..." />
      </div>
    </header>

    <div class="row g-3">
      <?php foreach ($items as $item):
        // Exibe cada pasta
        $full = $target . DIRECTORY_SEPARATOR . $item;
        $isDir = is_dir($full);
        $link = $isDir ? url_for_dir($relPath, $item) : url_for_file($relPath, $item);
      ?>

        <div class="col-12 col-md-6 col-lg-4 item-card" data-name="<?php echo strtolower($item); ?>">
          <a href="<?php echo htmlspecialchars($link); ?>" class="text-decoration-none">
            <div class="card shadow-sm">
              <div class="card-body d-flex gap-3 align-items-center">
                <div style="font-size:1.8rem; width:56px; text-align:center;">

                  <?php if ($isDir): ?>
                    <i class="bi bi-folder-fill text-warning"></i>
                  <?php else: ?>
                    <i class="bi <?php echo file_icon_class($item); ?>"></i>
                  <?php endif; ?>

                </div>
                <div class="flex-grow-1">
                  <div class="file-name fw-semibold"><?php echo htmlspecialchars($item); ?></div>
                  <div class="small-muted">

                    <?php
                    if ($isDir) {
                      $count = count(array_diff(@scandir($full) ?: [], ['.', '..', $self]));
                      echo "Folder • {$count} item(s)";
                    } else {
                      echo human_filesize(filesize($full)) . " • " . date("d/m/Y H:i", filemtime($full));
                    }
                    ?>

                  </div>
                </div>
                <div style="min-width:60px; text-align:right;">
                  <i class="bi bi-chevron-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>

    <footer class="mt-4 small text-muted">
      Tip: put this file in the root folder served by Laragon
    </footer>
  </div>

  <script>
    function goBack(e, fallbackUrl) {
      e.preventDefault();
      try {
        const ref = document.referrer;
        if (ref) {
          // Pega o dominio + protoclo
          const refOrigin = new URL(ref).origin;

          // Caso venha do mesmo site usa o historico
          if (refOrigin === location.origin) {
            history.back();
            return;
          }
        }
      } catch (err) {
        console.error("Unexpected error, using fallback.");
      }
      // Fallback para o pai
      location.href = fallbackUrl;
    }

    // Percorre cards para achar
    const search = document.getElementById('search');
    search.addEventListener('input', () => {
      const q = search.value.trim().toLowerCase();

      document.querySelectorAll('.item-card').forEach(card => {
        const name = card.getAttribute('data-name');
        card.style.display = (!q || name.includes(q)) ? '' : 'none';
      });
    });
  </script>
</body>
</html>
