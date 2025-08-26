<?php
/**
 * Plugin Update Checker Backend - Converttize
 * This script serves update information to the Plugin Update Checker library.
 *
 * It provides update details and direct download links for your plugin.
 * The script returns JSON data expected by the Plugin Update Checker library.
 *
 */

// Example: 'converttize-player'
$plugin_slug = $_GET['slug'] ?? '';

// --- CONFIGURAÇÃO DO SEU PLUGIN ---
$plugins_info = [
    'converttize-player' => [ // <--- O SLUG DO SEU PLUGIN. DEVE SER EXATAMENTE IGUAL AO QUE VOCÊ USA EM Puc_v4_Factory::buildUpdateChecker()
        'name'           => 'Converttize', // Nome do seu plugin
        'slug'           => 'converttize-player', // O mesmo slug acima
        'version'        => '1.0.3', // <--- A ÚLTIMA VERSÃO DISPONÍVEL DO SEU PLUGIN. (MAIOR QUE A ATUAL INSTALADA PARA DISPARAR ATUALIZAÇÃO)
        'download_url'   => 'https://github.com/GuLuiz/Converttize/releases/download/v1.0.3/converttize-player-1.0.3.zip', // <--- URL DIRETA PARA O ARQUIVO ZIP DA SUA RELEASE NO GITHUB
                                                                                                                           // Certifique-se de que 'converttize-player-1.0.1.zip' é o nome exato do ativo que você anexa à release v1.0.1 no GitHub.
        'tested'         => '6.5', // Versão do WordPress que foi testada com esta versão do plugin
        'requires'       => '5.0', // Versão mínima do WordPress exigida
        'requires_php'   => '7.4', // Versão mínima do PHP exigida
        'author'         => 'IGL Solutions', // Seu nome ou nome da empresa
        'homepage'       => 'https://converttize.com/', // URL da página inicial do plugin/produto
        'upgrade_notice' => 'Uma nova versão do Converttize (1.0.3) está disponível com melhorias e correções. Recomenda-se a atualização.', // Mensagem exibida no painel de atualizações do WP
        'sections'       => [
            'description' => 'Player minimalista com UX fluida, botões próprios e desbloqueio inteligente para o WordPress.',
            'changelog'   => '<h4>Versão 1.0.3</h4><ul><li>Melhoria na barra de progresso para vídeos curtos (Reels).</li><li>Otimização na inicialização do player.</li><li>Correção de pequenos bugs de interface.</li></ul><h4>Versão 1.0.0</h4><ul><li>Lançamento inicial.</li></ul>',
            // Você pode adicionar outras seções como 'installation', 'faq', 'screenshots', etc.
        ],
        // 'new_version_url' => 'https://github.com/GuLuiz/Converttize/releases/tag/v1.0.1', // Opcional: Link para o changelog completo no GitHub
    ],
    // Se você tiver outros plugins, adicione-os aqui com seus respectivos slugs.
];


// Define o cabeçalho HTTP para indicar que o conteúdo é JSON
header('Content-Type: application/json; charset=utf-8');

// Verifica se o slug do plugin solicitado existe na nossa lista
if (array_key_exists($plugin_slug, $plugins_info)) {
    echo json_encode($plugins_info[$plugin_slug]);
} else {
    // Se o slug não for encontrado, retorna um erro JSON
    echo json_encode(['error' => 'Plugin not found', 'slug_requested' => $plugin_slug]);
}

exit; 